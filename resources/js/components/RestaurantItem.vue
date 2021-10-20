<template>
    <div>
        <div class="row p-1">
            <div class="col-md-6">
                <h5>{{ restaurant.name }}</h5>
            </div>

            <div class="col-md">
                {{ restaurant.rating }}
            </div>

            <div class="col-md">
                <button
                    @click="
                        openMap(
                            restaurant.geometry.location,
                            restaurant.place_id
                        )
                    "
                >
                    view
                </button>
            </div>
        </div>

        <div class="row p-1">
            <div class="col-md">
                <small>{{ restaurant.vicinity }}</small>
            </div>
        </div>
    </div>
</template>

<script>
//  {
//             business_status: "OPERATIONAL",
//             geometry: {
//                 location: {
//                     lat: -33.8587323,
//                     lng: 151.2100055
//                 },
//                 viewport: {
//                     northeast: {
//                         lat: -33.85739817010727,
//                         lng: 151.2112278798927
//                     },
//                     southwest: {
//                         lat: -33.86009782989272,
//                         lng: 151.2085282201073
//                     }
//                 }
//             },
//             icon:
//                 "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/bar-71.png",
//             icon_background_color: "#FF9E67",
//             icon_mask_base_uri:
//                 "https://maps.gstatic.com/mapfiles/place_api/icons/v2/bar_pinlet",
//             name: "Cruise Bar",
//             opening_hours: {
//                 open_now: false
//             },
//             photos: [
//                 {
//                     height: 575,
//                     html_attributions: [
//                         '\u003ca href="https://maps.google.com/maps/contrib/112582655193348962755"\u003eA Google User\u003c/a\u003e'
//                     ],
//                     photo_reference:
//                         "Aap_uEDk4rymoSCeHhObdGSY22Vw_78L1i9CuHhHzXTuFnaVjcSFgjV33tKrw_3xBKuHuni7VdZk1-t-58JBGOX4WhFOeFZUNjOZDo8Qn557SiDgV16YvRBfHxYVnGvHf9hzTJhAHCcIJ2sqtJlK8Xriytu02jqiJtOhzyN9vRJ8qj9QXyPo",
//                     width: 766
//                 }
//             ],
//             place_id: "ChIJi6C1MxquEmsR9-c-3O48ykI",
//             plus_code: {
//                 compound_code: "46R6+G2 The Rocks, New South Wales",
//                 global_code: "4RRH46R6+G2"
//             },
//             price_level: 2,
//             rating: 4.1,
//             reference: "ChIJi6C1MxquEmsR9-c-3O48ykI",
//             scope: "GOOGLE",
//             types: [
//                 "bar",
//                 "restaurant",
//                 "food",
//                 "point_of_interest",
//                 "establishment"
//             ],
//             user_ratings_total: 1180,
//             vicinity:
//                 "Level 1, 2 and 3, Overseas Passenger Terminal, Circular Quay W, The Rocks"
//         },

export default {
    props: {
        restaurant: Object
    },

    methods: {
        openMap: function(location, id) {
            var lat = location.lat;
            var lng = location.lng;
            window.open(
                "https://www.google.com/maps/search/?api=1&query=" +
                    lat +
                    "%2C" +
                    lng +
                    "&query_place_id=" +
                    id,
                "_blank"
            );
        }
    },
    data() {}
};
</script>
