<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use SKAgarwal\GoogleApi\PlacesApi;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'middleware'], function () {
    Route::get('/user', function (Request $request) {});

    /*
    |-------------------------------------------------------------------------------
    | Get Restaurants from keyord(s)
    |-------------------------------------------------------------------------------
    | URL:            /api/v1/restaurants
    | Controller:     App\Http\Controllers\API\RestaurantsController@getRestaurants
    | Method:         GET
    | Description:   Get all Restaurants from keyord(s)
    */

    Route::get(
        '/restaurants',
        'App\Http\Controllers\API\RestaurantsController@getRestaurants'
    );

    /*
    |-------------------------------------------------------------------------------
    | Get Restaurants from location
    |-------------------------------------------------------------------------------
    | URL:            /api/v1/restaurantsnear
    | Controller:     App\Http\Controllers\API\RestaurantsController@getRestaurantsNear
    | Method:         GET
    | Description:    Gets all Restaurants from location and distance
    */

    Route::get(
        '/restaurantsnear',
        'App\Http\Controllers\API\RestaurantsController@getRestaurantsNear'
    );

    /*
    |-------------------------------------------------------------------------------
    | Get an Restaurant image
    |-------------------------------------------------------------------------------
    | URL:            /api/v1/restaurantimg
    | Method:         GET
    | Controller:     App\Http\Controllers\API\RestaurantsController@getRestaurantImg
    | Description:    Gets a Restaurant image
    */

    // Route::get('/restaurantimg', 'App\Http\Controllers\API\RestaurantsController@getRestaurantImg');
});
