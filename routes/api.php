<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function () {
    //Property
    Route::resource('property', 'PropertyController');
    //Analytic Types
    Route::resource('analytic-type', 'AnalyticTypeController');
    //Analytics
    Route::get('analytics/property/{id}', 'PropertyAnalyticController@analyticsForProperty');
    Route::post('analytics/property/{property_id}/analytic/{analytic_id}', 'PropertyAnalyticController@store');
    Route::put('analytics/property/{property_id}/analytic/{analytic_id}', 'PropertyAnalyticController@update');

    //Property Stats
    Route::get('/statistics/property', 'PropertyStatisticsController@propertyStatisticsByAttribute');

});
