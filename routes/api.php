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


Route::group(['prefix' => 'v1', 'middleware' ], function(){
    Route::get('/user', function( Request $request ){
        
});
Route::get('/restaurants', 'App\Http\Controllers\API\RestaurantsController@getRestaurants');
Route::get('/restaurantsnear', 'App\Http\Controllers\API\RestaurantsController@getRestaurantsNear');
Route::get('/restaurantimg', 'App\Http\Controllers\API\RestaurantsController@getRestaurantImg');
});
