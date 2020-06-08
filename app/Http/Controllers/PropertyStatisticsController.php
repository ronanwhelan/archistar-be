<?php

namespace App\Http\Controllers;

use App\Property;
use App\PropertyAnalytic;
use Illuminate\Http\Request;

class PropertyStatisticsController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function propertyStatisticsByAttribute(Request $request){

        if( !$request->has('attribute') || !$request->has('value') ){
            return [
                'data'=> [
                    'statistics' => null
                ]
            ];
        }

        $search = null;
        if($request->has('attribute')){
            switch ($request->has('attribute')) {
                case 'state':
                    $search ='state';
                    break;
                case 'suburb':
                    $search ='suburb';
                    break;
                case 'country':
                    $search ='country';
                    break;
            }
        }
        $value = $request->input('value');
        $statistics = null;
        if($search){
            $propertyIds = Property::where($search, $value)->pluck('id');
            $stats =  PropertyAnalytic::whereIn('property_id',$propertyIds)->select('value')->get();
            $statistics = [
                'min' => $stats->min('value'),
                'max' =>  $stats->max('value'),
                'median' =>  $stats->median('value'),
                'percentageWithValue' =>
                    $stats->where('value',0)->count() ? round(($stats->where('value',0)->count() / $stats->count()) * 100) . '%' : '0%',
                'percentageWithoutValue' =>
                    $stats->where('value','>', 0)->count() ? round(($stats->where('value','>', 0)->count() / $stats->count()) * 100) . '%' : '0%',
            ];
        }
        return [
            'data'=> [
                'statistics' => $statistics
            ]
        ];
    }

}
