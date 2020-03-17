<?php

use Illuminate\Http\Request;

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

Route::post('stats', 'StatController@store')->name('store.stats');
Route::post('visit-tracking', 'StatController@tracking')->name('store.tracking');
Route::post('get-tracked-offers', 'StatController@getTracked')->name('get.tracked');


Route::get('get-jooble-offers', 'JoobleController@getData');