<?php

use App\Http\Resources\StateCollection;
use App\Http\Resources\StateResource;
use App\Models\State;
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

Route::apiResource('property', 'Api\PropertyController')->middleware('auth:api');

Route::group(['prefix' => 'location'], function() {
    /**
     * Gets all the state info available
     */
    Route::get('states', function () {
        return StateResource::collection(State::all());
    });

    /**
     * Gets all the state info available as collection
     */
    Route::get('states/collection', function () {
        return new StateCollection(State::all());
    });

    Route::get('states/{id}', function ($id) {
        return new StateResource(State::find($id));
    });
});
