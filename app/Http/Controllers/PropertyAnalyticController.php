<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;

class PropertyAnalyticController extends Controller
{

    /**
     * @param $id
     *
     * @return array
     */
    public function analyticsForProperty($id){

        $property = Property::findOrFail( $id );

        return [
            'data'=> $property->analytics
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $propertyId
     * @param                          $analyticId
     *
     * @return bool[]
     */
    public function store(Request $request, $propertyId , $analyticId )
    {
        $property = Property::findOrFail( $propertyId );

        $property->analytics()->attach( $analyticId,  ['value' => $request->input('value')]);

        return [
            'success' => true
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $propertyId
     * @param                          $analyticId
     *
     * @return mixed
     */
    public function update(Request $request, $propertyId , $analyticId )
    {
        $property = Property::findOrFail($propertyId);

        $property->analytics()->updateExistingPivot( $analyticId, ['value' => $request->input('value')]);

        return [
            'success' => true
        ];
    }
}
