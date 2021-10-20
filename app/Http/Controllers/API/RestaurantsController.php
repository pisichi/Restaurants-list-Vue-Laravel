<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Request;
use App\Models\Restaurant;
use SKAgarwal\GoogleApi\PlacesApi;
use Illuminate\Support\Facades\Http;

class RestaurantsController extends Controller
{
    


  public function getRestaurants(){
    $url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurants%20in%20Bangsue&key=AIzaSyAg9Rds1NqIp3_c8CzqJABKnN90vz8pSC8';
    $response = file_get_contents($url);
    $newsData = json_decode($response);


    return response()->json($newsData);         

    // $restaurants = Restaurant::all();

    // $response = GooglePlaces::placeAutocomplete('BangSue');
    // $googlePlaces = new PlacesApi('AIzaSyAg9Rds1NqIp3_c8CzqJABKnN90vz8pSC8');
    // // $response = $googlePlaces->placeAutocomplete('BangSue');

    // $radius = 1500;

    // $location = [

    //     'latitude' => '36.187740',

    //     'longitude' => '-92.731422'

    // ];

    // $response = $googlePlaces->nearbySearch($location, 1500, []);
    


    // return response()->json( $response );
    // return ["name"=>"test"];
}

/*
|-------------------------------------------------------------------------------
| Get An Individual Restaurants
|-------------------------------------------------------------------------------
| URL:            /api/v1/Restaurantss/{id}
| Method:         GET
| Description:    Gets an individual Restaurants
| Parameters:
|   $id   -> ID of the Restaurants we are retrieving
*/
public function getRestaurant( $id ){
    $restaurant = Restaurant::where('id', '=', $id)->first();

    return response()->json( $restaurant );
}

/*
|-------------------------------------------------------------------------------
| Adds a New Restaurants
|-------------------------------------------------------------------------------
| URL:            /api/v1/Restaurantss
| Method:         POST
| Description:    Adds a new Restaurants to the application
*/
public function postNewRestaurants(){
    $restaurant = new restaurant();

    /*
  Get the Latitude and Longitude returned from the Google Maps Address.
*/
$coordinates = GoogleMaps::geocodeAddress( $request->get('address'));


    $restaurant->name     = Request::get('name');
    $restaurant->address  = Request::get('address');
    $restaurant->latitude   = $coordinates['lat'];
    $restaurant->longitude  = $coordinates['lng'];

    $restaurant->save();
    
    return response()->json($restaurant, 201);
}


}