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
| URL:            /api/v1/restaurants
| Method:         GET
| Description:    Gets Restaurants from keyword(s)
| Request Parameters:
|    $keyword   -> keyword String from the merged string array
                   ["keyword1","keyword2"] => "keyword1%keyword2"
*/

    //note cannot find a way to get more than 20 results at once.
    public function getRestaurants(Request $request)
    {
        $keyword = $request->input('keyword');

        //cache response data for 10 mins
        $data = cache()->remember($keyword, 60 * 10 * 1, function () use (
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

        return response()->json($data->original);
    }

    /*
|-------------------------------------------------------------------------------
| Get Restaurants list from from coordinates and radius(km)
|-------------------------------------------------------------------------------
| URL:            /api/v1/restaurantsnear
| Method:         GET
| Description:    Gets an individual Restaurant from location and distance
| Request Parameters:
|   $location    ->  a string of latitude and longitude in this format
                      lat + "%2c" + lng
    $radius     -> number (KM)        
*/

    //note cannot find a way to get more than 20 results at once.
    public function getRestaurantsNear(Request $request)
    {
        $location = $request->input('location');
        $radius = $request->input('radius');

        //cache response data for 10 mins
        $data = cache()->remember(
            $location . $radius,
            60 * 20 * 1,
            function () use (&$location) {
                $url =
                    'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=' .
                    $location .
                    '&radius=1500&type=restaurant&key=' .
                    $_ENV['GOOGLE_PLACE_API'];
                $response = file_get_contents(htmlspecialchars_decode($url));
                $data = json_decode($response)->results;

                return response()->json($data);
            }
        );

        return response()->json($data->original);
    }

    
    /*
|-------------------------------------------------------------------------------
| Get an Restaurant image
|-------------------------------------------------------------------------------
| URL:            /api/v1/restaurantimg
| Method:         GET
| Description:    Gets an individual Restaurant image from its reference
| Return:        Encoded base64 image
| Request Parameter:
    $photo_reference     ->  String

*/

    // public function getRestaurantImg($photo_reference)
    // {
    //     $url =
    //         'https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&' .
    //         $photo_reference .
    //         '&key=' .
    //         $_ENV['GOOGLE_PLACE_API'];
    //     $response = file_get_contents($url);
    //     $image = base64_encode($response);

    //     return response()->json(
    //         [
    //             'message' => 'Fetched sight!',
    //             'image' => $image,
    //         ],
    //         201
    //     );
    // }
}
