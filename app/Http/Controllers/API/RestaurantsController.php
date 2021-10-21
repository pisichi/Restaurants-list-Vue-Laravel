<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use SKAgarwal\GoogleApi\PlacesApi;
use Illuminate\Support\Facades\Http;

class RestaurantsController extends Controller
{
    /*
|-------------------------------------------------------------------------------
| Get Restaurants list from keyword
|-------------------------------------------------------------------------------
| URL:            /api/v1/Restaurantss
| Method:         GET
| Description:    Gets an individual Restaurants
| Parameters:
|   $id   -> ID of the Restaurants we are retrieving
*/

    public function getRestaurants(Request $request)
    {
        $keyword = $request->input('keyword');

        //cache 20 for mins     
        $data = cache()->remember($keyword, 60 * 20 * 1, function () use (
            &$keyword
        ) {
            $url =
                'https://maps.googleapis.com/maps/api/place/textsearch/json?query=restaurants%20in%20' .
                $keyword .
                '&key=' .
                $_ENV['GOOGLE_PLACE_API'];
            $response = file_get_contents(htmlspecialchars_decode($url));
            $data = json_decode($response)->results;
            return response()->json($data);
        });

        // foreach ($data as $item) {
        //     //foreach element in $arr

        //     $url =
        //         'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photo_reference=' .
        //         $item->photos[0]->photo_reference .
        //         '&key=' .
        //         $_ENV['GOOGLE_PLACE_API'];
        //     $response = file_get_contents(htmlspecialchars_decode($url));
        //     $image = base64_encode($response);

        //     $item->image = response()->json(
        //         [
        //             'message' => 'Fetched sight!',
        //             'image' => $image,
        //         ],
        //         201
        //     );
        // }

        return response()->json($data->original);
    }

    public function getRestaurantImg($photo_reference)
    {
        $url =
            'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&' .
            $photo_reference .
            '&key=' .
            $_ENV['GOOGLE_PLACE_API'];
        $response = file_get_contents($url);
        $image = base64_encode($response);

        return response()->json(
            [
                'message' => 'Fetched sight!',
                'image' => $image,
            ],
            201
        );
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
    public function getRestaurantsNear(Request $request)
    {
        $location = $request->input('location');
        $radius = $request->input('radius');

        $url =
            'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' .
            $location .
            '&radius=1500&type=restaurant&key=' .
            $_ENV['GOOGLE_PLACE_API'];
        $response = file_get_contents(htmlspecialchars_decode($url));
        $data = json_decode($response)->results;

        return response()->json($data);
    }

    /*
|-------------------------------------------------------------------------------
| Adds a New Restaurants
|-------------------------------------------------------------------------------
| URL:            /api/v1/Restaurantss
| Method:         POST
| Description:    Adds a new Restaurants to the application
*/
}
