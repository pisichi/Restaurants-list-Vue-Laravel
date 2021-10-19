<template>
    <div class="">
        <div class="bg">
            <div class="top-section container-fluid">
                <div class="row justify-content-center">
                    <div class="col-5 mt-5 text-center">
                        <h1>
                            Search Restaurant
                        </h1>
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="card search-wrapper p-3">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <div class="input-group">
                                        <input
                                            type="search"
                                            class="form-control mx-2"
                                            placeholder="Search"
                                            aria-label="Search"
                                            aria-describedby="search-addon"
                                        />

                                        <select
                                            class="form-select mx-2"
                                            aria-label="Default select example"
                                        >
                                            <option selected
                                                >radius(km)</option
                                            >
                                            <option value="5">5km</option>
                                            <option value="10">10km</option>
                                            <option value="15">15km</option>
                                        </select>

                                        <button
                                            type="button mx-2"
                                            class="btn btn-primary"
                                        >
                                            search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bottom-section container-fluid">
                <div class="row justify-content-center mb-5">
                    <div class="col col-lg-8 col-md-10 col-sm-12">
                        <div class="row justify-content-center">
                            <div class="col-6 ml-auto text-center">
                                keyword:
                            </div>

                            <div class="col-6 ml-auto text-center">
                                search result:
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div
                        class="result-wrapper col col-lg-8 col-md-10 col-sm-12 p-5"
                    >
                        <div class="row justify-content-center">
                            <ul class="list-group">
                                <li
                                    v-for="item in restaurants"
                                    v-bind:key="item"
                                    class="list-group-item my-2"
                                >
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            {{ item.name }}
                                        </li>
                                        <li class="list-group-item">
                                            {{ item.geometry.location }}
                                        </li>
                                        <li class="list-group-item">
                                            {{ item.opening_hours }}
                                        </li>
                                        <li class="list-group-item">
                                            {{ item.types }}
                                        </li>
                                        <li class="list-group-item">
                                            {{ item.rating }}
                                        </li>
                                        <li class="list-group-item">
                                            {{ item.vicinity }}
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            restaurants: [
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8587323,
                            lng: 151.2100055
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85739817010727,
                                lng: 151.2112278798927
                            },
                            southwest: {
                                lat: -33.86009782989272,
                                lng: 151.2085282201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/bar-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/bar_pinlet",
                    name: "Cruise Bar",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 575,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/112582655193348962755"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEDk4rymoSCeHhObdGSY22Vw_78L1i9CuHhHzXTuFnaVjcSFgjV33tKrw_3xBKuHuni7VdZk1-t-58JBGOX4WhFOeFZUNjOZDo8Qn557SiDgV16YvRBfHxYVnGvHf9hzTJhAHCcIJ2sqtJlK8Xriytu02jqiJtOhzyN9vRJ8qj9QXyPo",
                            width: 766
                        }
                    ],
                    place_id: "ChIJi6C1MxquEmsR9-c-3O48ykI",
                    plus_code: {
                        compound_code: "46R6+G2 The Rocks, New South Wales",
                        global_code: "4RRH46R6+G2"
                    },
                    price_level: 2,
                    rating: 4.1,
                    reference: "ChIJi6C1MxquEmsR9-c-3O48ykI",
                    scope: "GOOGLE",
                    types: [
                        "bar",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 1180,
                    vicinity:
                        "Level 1, 2 and 3, Overseas Passenger Terminal, Circular Quay W, The Rocks"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8675219,
                            lng: 151.2016502
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86618397010728,
                                lng: 151.2028713798927
                            },
                            southwest: {
                                lat: -33.86888362989273,
                                lng: 151.2001717201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Sydney Harbour Dinner Cruises",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 749,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/109764923610545394994"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEChLrM5Os_e2-P0YmXiS_YxOeQ8RfDifLrGCVbtazOg-jQrLe4_2FKB403rm8KmY02KJ12gVGzTlmWOzwpFQLcVUHAZG-4zWvhEYrRW9He_l09sTsr_rY6STGkRAKwaQhAksynXT9RgVEXtUQ-05NvkjGAlIL-rwvu1Ug3OsfKMao54",
                            width: 1000
                        }
                    ],
                    place_id: "ChIJM1mOVTS6EmsRKaDzrTsgids",
                    plus_code: {
                        compound_code: "46J2+XM Sydney, New South Wales",
                        global_code: "4RRH46J2+XM"
                    },
                    rating: 4.7,
                    reference: "ChIJM1mOVTS6EmsRKaDzrTsgids",
                    scope: "GOOGLE",
                    types: [
                        "tourist_attraction",
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 6,
                    vicinity: "32 The Promenade, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8675883,
                            lng: 151.2016452
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86623847010728,
                                lng: 151.2029950298927
                            },
                            southwest: {
                                lat: -33.86893812989273,
                                lng: 151.2002953701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Sydney Showboats - Dinner Cruise With Show",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 749,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/105311284660389698992"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEBVEU9M7FrhCcSw50kescoQlNhTIMZEoKG8LjmFKXHBm3eiH1V2UrpkbA4VY204WL-REkUEg_-LQ7OQrSQkBYgXxkjCIRzKDlhMziuMQ7AUQkQhQviSWsoWQP40GJptjhxf6hXaU9l_79hNSLpEG81KVJdG1HyRjwQQEzf_-JyCSwjs",
                            width: 1000
                        }
                    ],
                    place_id: "ChIJjRuIiTiuEmsRCHhYnrWiSok",
                    plus_code: {
                        compound_code: "46J2+XM Sydney, New South Wales",
                        global_code: "4RRH46J2+XM"
                    },
                    rating: 4.1,
                    reference: "ChIJjRuIiTiuEmsRCHhYnrWiSok",
                    scope: "GOOGLE",
                    types: [
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 109,
                    vicinity: "32 The Promenade, King Street Wharf, 5, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.85876140000001,
                            lng: 151.2100004
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85741157010727,
                                lng: 151.2113502298927
                            },
                            southwest: {
                                lat: -33.86011122989272,
                                lng: 151.2086505701072
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Junk Lounge",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 608,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/104473997089847488714"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uECi9suy2pxg_c7ZILLHw2F4mF1dwnSOx_1c8ukoEj4s5rWQzaEXG3FAM5VUB9_oq601A1RKkUr7mrim2NdlPhwpqCMREcb8qErT9_7ESFcYsBx09RNxKLXoYMqcGLIChiKvutgIoP1OCahIzlgAwpQewFV3gzyHZpSxLqk5Z-0zNm6l",
                            width: 1080
                        }
                    ],
                    place_id: "ChIJq9W3HZOvEmsRYtKNTRmq34M",
                    plus_code: {
                        compound_code: "46R6+F2 The Rocks, New South Wales",
                        global_code: "4RRH46R6+F2"
                    },
                    price_level: 2,
                    rating: 4.1,
                    reference: "ChIJq9W3HZOvEmsRYtKNTRmq34M",
                    scope: "GOOGLE",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 38,
                    vicinity:
                        "Level 2, Overseas Passenger Terminal, Circular Quay W, The Rocks"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8677035,
                            lng: 151.2017297
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86634597010728,
                                lng: 151.2031781298927
                            },
                            southwest: {
                                lat: -33.86904562989272,
                                lng: 151.2004784701072
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Sydney Harbour Lunch Cruise",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 545,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/102428257696490257922"\u003eSydney Harbour Lunch Cruise\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uECRrmNgdJ6y4tjddymXDLnEfgxlLswR_cZILu7Yowb1tXExJmOssCY2d_RkQp6w3ijdagr-Yx49eoGY4XOiJFrUT1i-AlyCtK73QlQqSBlcthuwHsQFtEz4P4PhQZ62be9LHiJq8UmWTUsE8QG7d7652YmJCsYYo_XLwRAAc1BdI1iX",
                            width: 969
                        }
                    ],
                    place_id: "ChIJUbf3iDiuEmsROJxXbhYO7cM",
                    plus_code: {
                        compound_code: "46J2+WM Sydney, New South Wales",
                        global_code: "4RRH46J2+WM"
                    },
                    rating: 3.9,
                    reference: "ChIJUbf3iDiuEmsROJxXbhYO7cM",
                    scope: "GOOGLE",
                    types: [
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 21,
                    vicinity: "5/32 The Promenade, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8676569,
                            lng: 151.2017213
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86629922010728,
                                lng: 151.2031712798927
                            },
                            southwest: {
                                lat: -33.86899887989272,
                                lng: 151.2004716201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Clearview Sydney Harbour Cruises",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 1261,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/114394575270272775071"\u003eClearview Glass Boat Cruises\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEDIdX3vHFt6pWY1HZl1wjglqvuI6RBtfd68E0h5f8y2QMqc9-ZsqdkVn5nAlVMTrMTc5nWLGULyn_mmRFfm38tdIqfy8gKw7-2zQTYaiyJfZqgbWTO705Qfo6lwgoT8gqtMFaPdJ1hvDHbcZv8Vq5c_2l_ZHP-uPbSKqYxIYb_lo_8Y",
                            width: 2600
                        }
                    ],
                    place_id: "ChIJNQfwZTiuEmsR1m1x9w0E2V0",
                    plus_code: {
                        compound_code: "46J2+WM Sydney, New South Wales",
                        global_code: "4RRH46J2+WM"
                    },
                    rating: 3.9,
                    reference: "ChIJNQfwZTiuEmsR1m1x9w0E2V0",
                    scope: "GOOGLE",
                    types: [
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 41,
                    vicinity: "32 The Promenade King Street Wharf 5, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8609391,
                            lng: 151.2098735
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85958927010727,
                                lng: 151.2112233298927
                            },
                            southwest: {
                                lat: -33.86228892989272,
                                lng: 151.2085236701072
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Australian Cruise Group",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 1536,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/113088009011192061895"\u003eKeith Bauman\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEAHhktPni6N0JJV5rCW4R6dPSWPOf5mR1RgGjcqYq05AuJRf-ICeranJ_kOF-b886HAA5yeYEuxO85DZZPyM4nP5aw0IcO4DIlovvHAz5vOUO2qTp_31NLLA22DsOZWHX8UjDZv0n0zX0OVVxmV7Ep3BISl0kFvESuEq9n6kmTkkSoZ",
                            width: 2048
                        }
                    ],
                    place_id: "ChIJpU8KgUKuEmsRKErVGEaa11w",
                    plus_code: {
                        compound_code: "46Q5+JW Sydney, New South Wales",
                        global_code: "4RRH46Q5+JW"
                    },
                    rating: 4.4,
                    reference: "ChIJpU8KgUKuEmsRKErVGEaa11w",
                    scope: "GOOGLE",
                    types: [
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 5,
                    vicinity: "6 Cirular Quay, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8686058,
                            lng: 151.2018206
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86730002010728,
                                lng: 151.2032717798927
                            },
                            southwest: {
                                lat: -33.86999967989272,
                                lng: 151.2005721201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Rhythmboat Cruises",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 2269,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/104066891898402903288"\u003eRhythmboat Sydney Harbour Cruises\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEDxFgiTHXp0nAI9yFTWFlrhYnQnwKADEKBlYNdq7VbUHBhhp1hGdNWx0g9Dtw5FfJtzBxFP97oGP_Nu_k3xgqSXhf0xJoB9b3OCmATawJ9zX0QbtpM5_UJExhkeb3nIDj5BOzLhQR7BPoC7gRoo9UVx4tc_BXtdMnsAcy4L31Z2zcR6",
                            width: 4032
                        }
                    ],
                    place_id: "ChIJyWEHuEmuEmsRm9hTkapTCrk",
                    plus_code: {
                        compound_code: "46J2+HP Sydney, New South Wales",
                        global_code: "4RRH46J2+HP"
                    },
                    rating: 3.8,
                    reference: "ChIJyWEHuEmuEmsRm9hTkapTCrk",
                    scope: "GOOGLE",
                    types: [
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 31,
                    vicinity: "King Street Wharf, King St, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8677035,
                            lng: 151.2017297
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86634597010728,
                                lng: 151.2031781298927
                            },
                            southwest: {
                                lat: -33.86904562989272,
                                lng: 151.2004784701072
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Magistic Cruises",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 4608,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/110367625438437705269"\u003eterry brennan\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEB_1uC-e_ZFx4AlgOUgJ2gM6JQtBeWVN02UrLFAOnX-J37l9CleOJ2d88QhnI5jLRJzMg1s60-xRyyGqRoaMS7nGdL-Ok__BvRvJ2DdlUrQf8BwTpip4D6FUshlt8KxxpuLzGAMkhYoiyVCIFzrzRJVdUnht1E1q1Rh8iRIIj7R19yB",
                            width: 3456
                        }
                    ],
                    place_id: "ChIJxRjqYTiuEmsRGebAA_chDLE",
                    plus_code: {
                        compound_code: "46J2+WM Sydney, New South Wales",
                        global_code: "4RRH46J2+WM"
                    },
                    rating: 4,
                    reference: "ChIJxRjqYTiuEmsRGebAA_chDLE",
                    scope: "GOOGLE",
                    types: [
                        "tourist_attraction",
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 96,
                    vicinity: "King Street Wharf, 32 The Promenade, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8610777,
                            lng: 151.209921
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85972787010726,
                                lng: 151.2112708298927
                            },
                            southwest: {
                                lat: -33.86242752989271,
                                lng: 151.2085711701072
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Harbour Bar and Restaurant - Circular Quay",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 1000,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/104782720231373079160"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEDW6FJfncQobqSd45G2_yIhzTxGe5EzbBb025tm9MrablmYMiYPgbJusdbr7A0lQy1gcDlyB1dv1qF4G0T36FpYQ3S8y0A1aFFDVT4T44Zw2qJmlCWVCTM-UEiazgE0FYBQQUELhvNWMcdEeER38g52wNS1piF13lHfeCyS8Yaoq302",
                            width: 1000
                        }
                    ],
                    place_id: "ChIJ-eQdS66vEmsRvh5Vx6UatuM",
                    plus_code: {
                        compound_code: "46Q5+HX Sydney, New South Wales",
                        global_code: "4RRH46Q5+HX"
                    },
                    rating: 4.7,
                    reference: "ChIJ-eQdS66vEmsRvh5Vx6UatuM",
                    scope: "GOOGLE",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 98,
                    vicinity: "Circular Quay Wharf 6, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8714141,
                            lng: 151.1898651
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86961542010728,
                                lng: 151.1914914298927
                            },
                            southwest: {
                                lat: -33.87231507989273,
                                lng: 151.1887917701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Glass Island",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 4480,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/117745044320706972021"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEAsOAWlHggVkf_S4vmopGQHsYOJykiSJtXQi2HxYv5NQsn629GtXE92PBgwuMHXQfPiAkveo0pdx2EJY2n8QuDwBhhckSrJiSmILe-V241zknU5vO8WUs4H6SQszhoKEKER_P4euVpjK-5C4KqlK-3dl8W3vbwESVqNTNwJD5i4E83r",
                            width: 6720
                        }
                    ],
                    place_id: "ChIJnScuboavEmsRyh-FGxhc3pw",
                    plus_code: {
                        compound_code: "45HQ+CW Pyrmont, New South Wales",
                        global_code: "4RRH45HQ+CW"
                    },
                    rating: 4.4,
                    reference: "ChIJnScuboavEmsRyh-FGxhc3pw",
                    scope: "GOOGLE",
                    types: [
                        "bar",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 77,
                    vicinity: "37 Bank St, Pyrmont"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8677035,
                            lng: 151.2017297
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86634597010728,
                                lng: 151.2031781298927
                            },
                            southwest: {
                                lat: -33.86904562989272,
                                lng: 151.2004784701072
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/generic_business-71.png",
                    icon_background_color: "#7B9EB0",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/generic_pinlet",
                    name: "Sydney New Year's Eve Cruises",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 1152,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/115281801304517408477"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEAn7JDmvxI9cWUEkVxT4Eaueaknr-v2FBuxwkru4kl1jYOowH5E6tDP-BE9JJZ9nnPgyoClHYCZowbXD0uhNNxouEzGgUoCZRUhOPTpZidfGKVRqz9XmWTSBCGTgm66Xv-Jx9ULCjFCh3lLBu9L5h66hSlnkLPISG1qI3tE6vRQpw8i",
                            width: 2048
                        }
                    ],
                    place_id: "ChIJ__8_hziuEmsR27ucFXECfOg",
                    plus_code: {
                        compound_code: "46J2+WM Sydney, New South Wales",
                        global_code: "4RRH46J2+WM"
                    },
                    rating: 4.8,
                    reference: "ChIJ__8_hziuEmsR27ucFXECfOg",
                    scope: "GOOGLE",
                    types: [
                        "travel_agency",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 4,
                    vicinity: "King Street Wharf 5, 32 The Promenade, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8577528,
                            lng: 151.2096001
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85641967010727,
                                lng: 151.2110388298927
                            },
                            southwest: {
                                lat: -33.85911932989272,
                                lng: 151.2083391701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Quay Restaurant",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 1000,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/113946894285031837777"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEDD89g--JJDYRe5Li8uxA5uFMrBn9UKk6aGKAR5jLCUlNqKimYvwncFcUGdyhgongop-YJ5JFqb66wizaV2HRWBvvOS9mkjIrhSGWO4i8_A5tvQi5lN_ExyUPEcGw1hkFWwNCxjTs_XnSxEk9riQEHtQQcwNqYz8o6lbQMSMxcG0sbK",
                            width: 1500
                        }
                    ],
                    place_id: "ChIJ4cQcDV2uEmsRMxTEHBIe9ZQ",
                    plus_code: {
                        compound_code: "46R5+VR The Rocks, New South Wales",
                        global_code: "4RRH46R5+VR"
                    },
                    price_level: 4,
                    rating: 4.5,
                    reference: "ChIJ4cQcDV2uEmsRMxTEHBIe9ZQ",
                    scope: "GOOGLE",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 925,
                    vicinity:
                        "Upper Level Overseas Passenger Terminal, The Rocks"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8569483,
                            lng: 151.2091906
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85563502010727,
                                lng: 151.2104544798927
                            },
                            southwest: {
                                lat: -33.85833467989272,
                                lng: 151.2077548201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "6HEAD",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 4032,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/106112212172505177443"\u003eROH BOT\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uECWb67tvPoNj1ms0HG2O6zn9-DPv3b1ChhfTV-AuLdVAT83qaqgdsOP7GdqfSX-uljEqdUwc_afpc56li_I1mecDZSvHR-rOvJDlff4kkTK4cvqxr2GfPefQZZjQO8-1W3wV3X9HIDUVBHedkzKjmTOT82SXWm2ZJSUk91f37fedGRQ",
                            width: 3024
                        }
                    ],
                    place_id: "ChIJB7lkaV2uEmsRoPnko9dUzYw",
                    plus_code: {
                        compound_code: "46V5+6M The Rocks, New South Wales",
                        global_code: "4RRH46V5+6M"
                    },
                    rating: 4.6,
                    reference: "ChIJB7lkaV2uEmsRoPnko9dUzYw",
                    scope: "GOOGLE",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 618,
                    vicinity:
                        "Bay 10 & 11, Campbell’s Stores, 7-27 Circular Quay W, The Rocks"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8566939,
                            lng: 151.2048142
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85541547010728,
                                lng: 151.2062596298927
                            },
                            southwest: {
                                lat: -33.85811512989272,
                                lng: 151.2035599701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Lavana Restaurant",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 3780,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/118254595749042091496"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEB85hhgPvxQjq0nYVJb9pnr4irF_wkZ-ECVa1ahU6spcFgvDl3dyfZDgwZalFccK3wxQxhPkKlApvvFfCV-_PSHdq1Xw-722mRACRoPygp3HG9ZQ-nJ2GPc6G9Y7OvPM_YtRgRUWwXpI5gM7tVMrZGGE6zg4rytgpGLLPPCgAAqx3FF",
                            width: 3024
                        }
                    ],
                    place_id: "ChIJH0fipVyuEmsRmLcS6SvODcE",
                    plus_code: {
                        compound_code: "46V3+8W Dawes Point, New South Wales",
                        global_code: "4RRH46V3+8W"
                    },
                    price_level: 2,
                    rating: 4.3,
                    reference: "ChIJH0fipVyuEmsRmLcS6SvODcE",
                    scope: "GOOGLE",
                    types: [
                        "restaurant",
                        "cafe",
                        "bar",
                        "food",
                        "point_of_interest",
                        "store",
                        "establishment"
                    ],
                    user_ratings_total: 282,
                    vicinity: "6/17A Hickson Rd, Dawes Point"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8548209,
                            lng: 151.1826556
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85351212010728,
                                lng: 151.1840418298927
                            },
                            southwest: {
                                lat: -33.85621177989272,
                                lng: 151.1813421701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/bar-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/bar_pinlet",
                    name: "Dry Dock Hotel",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 2988,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/116178563532851517978"\u003eprakash poudel\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEA7j3DfBONtUrWMKdpYWJWiulKqeXuHA6rCIb-cLIY-Yq0h2KfqPdi7IDAbq67lcWFYY7HS_81rwBZ53T4j7Vt3CF1MuXRAdy2mb5qbKMfW5mDgKw9tL2AjMRXjyYAzy8qYpyWhgS2xgDVQ6S3oC3FpvWU68KtKVwbk1zhEzpsD-f5l",
                            width: 5312
                        }
                    ],
                    place_id: "ChIJLZs8yLOvEmsRYCrcSyaoTGU",
                    plus_code: {
                        compound_code: "45WM+33 Balmain, New South Wales",
                        global_code: "4RRH45WM+33"
                    },
                    rating: 4.2,
                    reference: "ChIJLZs8yLOvEmsRYCrcSyaoTGU",
                    scope: "GOOGLE",
                    types: [
                        "bar",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 207,
                    vicinity: "Dry Dock Hotel, 22 Cameron St, Balmain"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8575785,
                            lng: 151.2090168
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85632387010727,
                                lng: 151.2103120798927
                            },
                            southwest: {
                                lat: -33.85902352989272,
                                lng: 151.2076124201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Ribs & Burgers The Rocks",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 821,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/107057652329118895883"\u003eRibs &amp; Burgers\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEDw1CV-eGnADZqHSHYtZ5s4PQ0JfnrCyD6J-idiUZM56n54YP-R2OSp82rdZcWbXwwjztsTsqJDIeM1Bz2hjptBDKq1jcU6Pz29ccLcthS_DYafajE0mTQyYPS4NCpuYEO1xXEJF_ggzm3_pyKtw0ohyvcsqOyQ2smIhMjtaV1AY_9N",
                            width: 1098
                        }
                    ],
                    place_id: "ChIJ2aIhR12uEmsRmcMgiA3U3b8",
                    plus_code: {
                        compound_code: "46R5+XJ Sydney, New South Wales",
                        global_code: "4RRH46R5+XJ"
                    },
                    price_level: 2,
                    rating: 4.4,
                    reference: "ChIJ2aIhR12uEmsRmcMgiA3U3b8",
                    scope: "GOOGLE",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 1996,
                    vicinity: "88 George St, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8682695,
                            lng: 151.201771
                        },
                        viewport: {
                            northeast: {
                                lat: -33.86700307010727,
                                lng: 151.2032339798927
                            },
                            southwest: {
                                lat: -33.86970272989272,
                                lng: 151.2005343201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Manjits Wharf",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 1868,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/101426609423179628746"\u003eManjits @ The Wharf\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEB8A5-cJZ24EqTOzlDCjSEC1uonZ4yo1skDc6JFtb7KZ_Ke9UgL7xE5P4Stnlt93VBq1Z2PX9J8CQ9PwjCdVwkV_RTgajDPWMU6p8o4lE8NoLCP4ji325bh1h1ghLcJms8xUkFbcnoUTGO2Jv3i8SjiDdWet1QSHvLw517ZxWE8zvaz",
                            width: 2800
                        }
                    ],
                    place_id: "ChIJIWt88ziuEmsR_87AR1awpAE",
                    plus_code: {
                        compound_code: "46J2+MP Sydney, New South Wales",
                        global_code: "4RRH46J2+MP"
                    },
                    price_level: 3,
                    rating: 3.9,
                    reference: "ChIJIWt88ziuEmsR_87AR1awpAE",
                    scope: "GOOGLE",
                    types: [
                        "bar",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 1314,
                    vicinity: "10/49 Lime St, Sydney"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8594514,
                            lng: 151.2086655
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85808762010728,
                                lng: 151.2100794798928
                            },
                            southwest: {
                                lat: -33.86078727989273,
                                lng: 151.2073798201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/cafe-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/cafe_pinlet",
                    name: "The Rocks Cafe",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 3024,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/105054379590955734859"\u003eNatalie Adcock\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uEBPSDLW-y5sCHQbWbnaA5i8PmBqZIufL9CQFK1IW6DJvAh2jCptYSsVaa963a8J30A42s9Gffa43MUl7vS4kayAUfcTfAXg3qroGNxH8lau7u9F3JfoPIGxjGmTAsflsA-rKuHrJlFolMwWtagDLODXEIMqDQRqeIyouOPCTgO-UJNm",
                            width: 4032
                        }
                    ],
                    place_id: "ChIJkxf4qwCoEmsRHQXs73axPI8",
                    plus_code: {
                        compound_code: "46R5+6F The Rocks, New South Wales",
                        global_code: "4RRH46R5+6F"
                    },
                    price_level: 2,
                    rating: 4.4,
                    reference: "ChIJkxf4qwCoEmsRHQXs73axPI8",
                    scope: "GOOGLE",
                    types: [
                        "cafe",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "store",
                        "establishment"
                    ],
                    user_ratings_total: 876,
                    vicinity: "99 George St, The Rocks"
                },
                {
                    business_status: "OPERATIONAL",
                    geometry: {
                        location: {
                            lat: -33.8584266,
                            lng: 151.2099772
                        },
                        viewport: {
                            northeast: {
                                lat: -33.85659817010728,
                                lng: 151.2113069798927
                            },
                            southwest: {
                                lat: -33.85929782989272,
                                lng: 151.2086073201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Yuki's at the Quay",
                    opening_hours: {
                        open_now: false
                    },
                    photos: [
                        {
                            height: 3008,
                            html_attributions: [
                                '\u003ca href="https://maps.google.com/maps/contrib/111950905810286881605"\u003eA Google User\u003c/a\u003e'
                            ],
                            photo_reference:
                                "Aap_uED51mFa_hM7EvxvuKbCF97LzjG4dx-g7xa7KdJSZhUwOe7gpvY4P6-yIfuZonZLfYi2QcxJYjVUv5VLPdeX8i4NVmU5j9i60Yi6P2uGuEBcUxTF6A3Y48tf0yzjwwyTMIl9seVvrXdG1WFbm824DHidQluQ_i4A6KyhCXCL3fwicIuS",
                            width: 4343
                        }
                    ],
                    place_id: "ChIJkUcHV12uEmsRdEyuYJC4zDk",
                    plus_code: {
                        compound_code: "46R5+JX The Rocks, New South Wales",
                        global_code: "4RRH46R5+JX"
                    },
                    price_level: 2,
                    rating: 4.1,
                    reference: "ChIJkUcHV12uEmsRdEyuYJC4zDk",
                    scope: "GOOGLE",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 145,
                    vicinity: "Level 4 Overseas Passenger Terminal, The Rocks"
                }
            ]
        };
    }
};
</script>

<style scoped>
.bg {
    background-color: #f5f5f5;
    background-image: url("../../../public/map-bg.png");
    height: 100vh;
    /* width: 100vw; */
    overflow: auto;
}

.top-section {
    background-color: #f5f5f5a4;
    box-shadow: 0 0 1rem 0 rgba(255, 255, 255, 0.2);
}

.bottom-section {
    background-color: #f5f5f5a4;
    box-shadow: 0 0 1rem 0 rgba(255, 255, 255, 0.2);
}

/* .result-wrapper {
    box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    background: inherit;
    overflow: auto;
    overflow-x: hidden;
}

.result-wrapper:before {
    box-shadow: 0 0 1rem 0 rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    background-color: #f5f5f5;
    overflow: auto;
    overflow-x: hidden;
} */

.result-wrapper {
    background-color: #ffffff;
    border-radius: 5px;
}
</style>
