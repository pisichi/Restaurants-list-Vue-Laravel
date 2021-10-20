<template>
    <div class="">
        <div class="bg">
            <div class="top-section container-fluid">
                <div class="row justify-content-center">
                    <div class="col-5 mt-5 text-center">
                        <h1>
                            Search Restaurant

                            <!-- {{ restaurants }} -->
                        </h1>
                        <small
                            >your location lat:{{ this.coordinates.lat }} lng:{{
                                this.coordinates.lng
                            }}</small
                        >
                    </div>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="search-wrapper ">
                            <div id="tabs" class="container">
                                <div class="tabs">
                                    <a
                                        v-on:click="activetab = 1"
                                        v-bind:class="[
                                            activetab === 1 ? 'active' : ''
                                        ]"
                                        >Radius Search</a
                                    >
                                    <a
                                        v-on:click="activetab = 2"
                                        v-bind:class="[
                                            activetab === 2 ? 'active' : ''
                                        ]"
                                        >Keyword search</a
                                    >
                                </div>

                                <div class="content">
                                    <div
                                        v-if="activetab === 1"
                                        class="tabcontent"
                                    >
                                        <div class="row justify-content-center">
                                            <div class="col-md">
                                                <div class="input-group">
                                                    <input
                                                        type="search"
                                                        class="form-control mx-2"
                                                        placeholder="Search"
                                                        aria-label="Search"
                                                        aria-describedby="search-addon"
                                                        v-model="search"
                                                    />

                                                    <button
                                                        type="button mx-2"
                                                        class="btn btn-primary"
                                                        @click="getrestaurants()"
                                                    >
                                                        search
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        v-if="activetab === 2"
                                        class="tabcontent"
                                    >
                                        <div class="row justify-content-center">
                                            <div class="col-md">
                                                <div class="input-group">
                                                    <input
                                                        type="search"
                                                        class="form-control mx-2"
                                                        placeholder="Search"
                                                        aria-label="Search"
                                                        aria-describedby="search-addon"
                                                        v-model="search"
                                                    />

                                                    <select
                                                        class="form-select mx-2"
                                                        aria-label="Default select example"
                                                        v-model="radius"
                                                    >
                                                        <option selected
                                                            >radius(km)</option
                                                        >
                                                        <option value="5"
                                                            >5km</option
                                                        >
                                                        <option value="10"
                                                            >10km</option
                                                        >
                                                        <option value="15"
                                                            >15km</option
                                                        >
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
                    </div>
                </div>
            </div>

            <div
                class="bottom-section container-fluid"
                v-if="restaurants.length > 0"
            >
                <div class="row justify-content-center mb-5">
                    <div class="col col-lg-8 col-md-10 col-sm-12">
                        <div class="row justify-content-center">
                            <div class="col-6 ml-auto text-center">
                                keyword: {{ search }}
                            </div>

                            <div class="col-6 ml-auto text-center">
                                search result: {{ restaurants.length }}
                            </div>

                            <div class="col-6 ml-auto text-center">
                                radius: {{ radius }} page: {{ page }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div
                        class="result-wrapper col col-lg-8 col-md-10 col-sm-12 p-5"
                    >
                        <ul class="list-group">
                            <li
                                v-for="(item, idx) in displayedrestaurants"
                                :key="idx"
                                class="list-group-item my-2"
                            >
                                <!-- {{ item }} -->
                                <!-- <restaurantitem :restaurant="item">
                                </restaurantitem> -->

                                <div>
                                    <div class="row p-1">
                                        <div class="col-md-8 m-2">
                                            <div class="row">
                                                <div>
                                                    {{ item.name }}
                                                    <!-- <a
                                                        :class="
                                                            item.opening_hours
                                                                .open_now ===
                                                            true
                                                                ? 'text-success'
                                                                : 'text-danger'
                                                        "
                                                    >
                                                        •
                                                    </a> -->
                                                </div>
                                            </div>

                                            <div class="row">
                                                <small>{{
                                                    item.formatted_address
                                                }}</small>
                                            </div>
                                        </div>
                                        <div class="col-md m-2">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        {{ item.rating }}
                                                    </div>

                                                    <div class="row">
                                                        <small
                                                            >{{
                                                                distance(
                                                                    item
                                                                        .geometry
                                                                        .location
                                                                )
                                                            }}
                                                            km</small
                                                        >
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <button
                                                        class="btn btn-success"
                                                        @click="
                                                            openMap(
                                                                item.geometry
                                                                    .location,
                                                                item.place_id
                                                            )
                                                        "
                                                    >
                                                        view
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <button
                                    type="button"
                                    class="page-link"
                                    v-if="page != 1"
                                    @click="page--"
                                >
                                    Previous
                                </button>
                            </li>
                            <li class="page-item">
                                <button
                                    type="button"
                                    class="page-link"
                                    v-for="(pageNumber, idx) in pages.slice(
                                        page - 1,
                                        page + 5
                                    )"
                                    :key="idx"
                                    @click="page = pageNumber"
                                >
                                    {{ pageNumber }}
                                </button>
                            </li>
                            <li class="page-item">
                                <button
                                    type="button"
                                    @click="page++"
                                    v-if="page < pages.length"
                                    class="page-link"
                                >
                                    Next
                                </button>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import restaurantitem from "./RestaurantItem.vue";

export default {
    components: {
        restaurantitem
    },

    data() {
        return {
            restaurants: [],
            page: 1,
            perPage: 5,
            pages: [],
            search: "",
            radius: 0,
            activetab: 1,
            coordinates: {
                lat: "",
                lng: ""
            }
        };
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
        },

        getrestaurants() {
            // try {
            //     const response =  await this.$http.get(
            //         "http://localhost:8000/api/v1/restaurants/"
            //     );
            //     // JSON responses are automatically parsed.
            //     this.restaurants = response.data.results;
            //     console.log(restaurants);
            // } catch (error) {
            //     // console.log(error);
            // }

            this.restaurants = [
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "166 23 Pracha Rat Sai 2 Rd, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8062834,
                            lng: 100.5255873
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80767007989272,
                                lng: 100.5269382798927
                            },
                            southwest: {
                                lat: 13.80497042010728,
                                lng: 100.5242386201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Nigi Express, Bangsue",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 3024,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/117901827244049778195">Luie Saetang</a>'
                            ],
                            photo_reference:
                                "Aap_uEBv_6sIxiKxFPNzPGvpW85aI3-aqI6e3xaQkxaA6wOjdLfDaFfvOGNSqhBeOsZKjlygM0ga-jZE-C5NogmKVqaLRpBUJcgQErAxnOYvOmZ51tM3Us2Ll0KUUSV-Z3ODevrRxqMY8cbHGak-ZWHKv5Q9LWXMx1UUOxNfz_e9hNrv5Mlj",
                            width: 4032
                        }
                    ],
                    place_id: "ChIJ24O8w0ib4jARdYa76q1-ykk",
                    plus_code: {
                        compound_code: "RG4G+G6 Bangkok",
                        global_code: "7P52RG4G+G6"
                    },
                    rating: 5,
                    reference: "ChIJ24O8w0ib4jARdYa76q1-ykk",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 16
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "848/76 U-Delight 3 Condo, Pracha Chuen Rd, Wong Sawang, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8251091,
                            lng: 100.5376092
                        },
                        viewport: {
                            northeast: {
                                lat: 13.82644887989272,
                                lng: 100.5390050798927
                            },
                            southwest: {
                                lat: 13.82374922010728,
                                lng: 100.5363054201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "มะม่วงน้ำปลาหวานแรดมาก",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 809,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/106547669811609991562">A Google User</a>'
                            ],
                            photo_reference:
                                "Aap_uEB-U__d8qB2h7WHjOBZ8N2TXWfLuUK7wAXsT1sKeo-vJ-wTKfpLNrTzC1n6T8JrGmy1jUO2mEvzhApcP98glRCaecxC4IXOCILjpXo_q3B_L2IA11iD4_u4xC9qOqfRcwU0rjTI7gAtV0K9P1FUdZUPWsbtemOrSNUjdSbGOGRiL0g2",
                            width: 1440
                        }
                    ],
                    place_id: "ChIJFwu616yd4jARyfTgce35YBY",
                    plus_code: {
                        compound_code: "RGGQ+22 Bangkok",
                        global_code: "7P52RGGQ+22"
                    },
                    rating: 5,
                    reference: "ChIJFwu616yd4jARyfTgce35YBY",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "store",
                        "establishment"
                    ],
                    user_ratings_total: 18
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "449, 5 ซอยไสวสุวรรณ Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8123358,
                            lng: 100.5293371
                        },
                        viewport: {
                            northeast: {
                                lat: 13.81365372989272,
                                lng: 100.5306950798927
                            },
                            southwest: {
                                lat: 13.81095407010728,
                                lng: 100.5279954201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/cafe-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/cafe_pinlet",
                    name:
                        "LAB COFFEE x PUDDING LAB CAFE (Bangsue Taopoon soi sawaisuwan specialty coffee) กาแฟ พุดดิ้ง คาเฟ่ บางซื่อ ถ. กรุงเทพ-นนทบุรี",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 4000,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/100286192742796341812">A Google User</a>'
                            ],
                            photo_reference:
                                "Aap_uEBG9O-7CKQYXlqe8xtWlu-RDcAO8b2-V97euMYlAyfr5HjXW41ySRO-72TIgn2sAppptpiMK9YP6_QIV26E8643BzT8N_qDKtHKz9GqyVvID8FTPAbJDnCwmE0vgGXH1lpLZZ6sL4Bn8x3K4PCMKbtK_KmhTgjhlIup2qFOdCV3RC6Q",
                            width: 6000
                        }
                    ],
                    place_id: "ChIJe-jR3Sib4jARWqd8IFXQcZ4",
                    plus_code: {
                        compound_code: "RG6H+WP Bangkok",
                        global_code: "7P52RG6H+WP"
                    },
                    rating: 5,
                    reference: "ChIJe-jR3Sib4jARWqd8IFXQcZ4",
                    types: [
                        "cafe",
                        "meal_takeaway",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "store",
                        "establishment"
                    ],
                    user_ratings_total: 69
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "1966 Soi Krungthep-Nonthaburi 46, Wong Sawang, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8277446,
                            lng: 100.5341291
                        },
                        viewport: {
                            northeast: {
                                lat: 13.82902187989272,
                                lng: 100.5355037298927
                            },
                            southwest: {
                                lat: 13.82632222010728,
                                lng: 100.5328040701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "ติ๋ม หมู เต๊ะ",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 720,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/114113287042128328895">A Google User</a>'
                            ],
                            photo_reference:
                                "Aap_uEDwY9peEXeW0mQVz59wlnJmQKb_N2TqMQQnb2klA4j2H53-igPUG_hh98YIMWiS8WJPzc4gNxbMyhZLAjGYSlENbzK7cutqsluKOrCgsCPBXl4By1w8qvmBRW62IT2pwgEH1iHUg185kkXXP9sl4vdZuZVZoJcc0bJoJX5yNZPMeAuU",
                            width: 1080
                        }
                    ],
                    place_id: "ChIJVbf3u-yd4jARwWaaFs8iNig",
                    plus_code: {
                        compound_code: "RGHM+3M Bangkok",
                        global_code: "7P52RGHM+3M"
                    },
                    rating: 4.9,
                    reference: "ChIJVbf3u-yd4jARwWaaFs8iNig",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 12
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "393/3, 393/3 Pracha Rat Sai 2 Rd, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8065862,
                            lng: 100.5210336
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80784837989272,
                                lng: 100.5226670798927
                            },
                            southwest: {
                                lat: 13.80514872010728,
                                lng: 100.5199674201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "จั๊กหน่อย Jaknoi Restaurant",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 2448,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/107473491486409929688">mindze09</a>'
                            ],
                            photo_reference:
                                "Aap_uEDZmKlEFeKGZnwLt1BH2FKTn6AJpdjpOicakSgZ_wI6lcTR65xtkWKzilrnzzMNBcHOZzY5fctfTuOr95qGghZDDzkuCATxJNLP5-Ws6I6pzKW2chAhWGd1hg1GsjPasW8sRAL4-LIkA2RZ9CqayuWwtrCKgPiT7BYWucL7ue8Eyie5",
                            width: 3264
                        }
                    ],
                    place_id: "ChIJ-yZhqo2b4jARsYKjNsLniIw",
                    plus_code: {
                        compound_code: "RG4C+JC Bangkok",
                        global_code: "7P52RG4C+JC"
                    },
                    rating: 4.4,
                    reference: "ChIJ-yZhqo2b4jARsYKjNsLniIw",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 123
                },
                {
                    business_status: "CLOSED_TEMPORARILY",
                    formatted_address:
                        "162/1 Pracha Rat Sai 2 Rd, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8056303,
                            lng: 100.5236035
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80734132989272,
                                lng: 100.5249488298927
                            },
                            southwest: {
                                lat: 13.80464167010728,
                                lng: 100.5222491701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Time&Tales gateway bangsue",
                    permanently_closed: true,
                    photos: [
                        {
                            height: 3968,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/105359838543665032930">Pty L</a>'
                            ],
                            photo_reference:
                                "Aap_uEDUsXfg9pL_6mHt0Uxk_0X_GnSyRqeyAxkxEyK_jhjJgPiMcAiSIk85Jr6BuKn5S6dveuUdkLa-RWauRaSglzXKhRAAx3wdDalzG01Ma6p6UphLWjo7-GsTaF8dtpr_uyvG8G3jFXBwJcKyNMCQsBNMvUXS0f7GYoLIvjHVfduOxq5W",
                            width: 2976
                        }
                    ],
                    place_id: "ChIJh67w6WSb4jARhDt-7y2zPEk",
                    plus_code: {
                        compound_code: "RG4F+7C Bangkok",
                        global_code: "7P52RG4F+7C"
                    },
                    rating: 4.3,
                    reference: "ChIJh67w6WSb4jARhDt-7y2zPEk",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 10
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "3rd Floor, 1 Pracha Rat Sai 2 Rd, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8061205,
                            lng: 100.5240966
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80758672989272,
                                lng: 100.5254468798927
                            },
                            southwest: {
                                lat: 13.80488707010728,
                                lng: 100.5227472201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "MK Restaurant-Gateway Bangsue",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 3024,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/102894475024781102033">Chaiyaphum Siripanpornchana</a>'
                            ],
                            photo_reference:
                                "Aap_uECO2RbV_gleg67DD5mFxlV45UVWagh7VC4uaDBwCI-N1ajRyZIoks8ivOasU43XxI8Tb1Xgqyx_67H4hUhaprlO_wDTAQvqXoeW7h7oGShUP1TDq9s1xvd_FXv47_v2jtQXVitomhfrt4OyQUjc7Go4YSmNwP6HwDEMrNEkYoF3e3k",
                            width: 4032
                        }
                    ],
                    place_id: "ChIJdcdrnIyb4jARidxLOO6zAZs",
                    plus_code: {
                        compound_code: "RG4F+CJ Bangkok",
                        global_code: "7P52RG4F+CJ"
                    },
                    price_level: 2,
                    rating: 4.1,
                    reference: "ChIJdcdrnIyb4jARidxLOO6zAZs",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 47
                },
                {
                    business_status: "CLOSED_TEMPORARILY",
                    formatted_address:
                        "9, 7 Soi Krungthep-Nonthaburi 56, Khwaeng Wong Sawang, Khet Bang Sue, Krung Thep Maha Nakhon 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8317004,
                            lng: 100.5259298
                        },
                        viewport: {
                            northeast: {
                                lat: 13.83301982989272,
                                lng: 100.5273114298927
                            },
                            southwest: {
                                lat: 13.83032017010728,
                                lng: 100.5246117701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "AI SALAD",
                    permanently_closed: true,
                    photos: [
                        {
                            height: 2988,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/104305914126020555450">Sirisak Yonaree</a>'
                            ],
                            photo_reference:
                                "Aap_uEDqTDYxitvnR8E7ro4gYxiktwEiR0YdfP6HwyVSkwQ76N-BlGtocw051MFezgwW1QqrO-vYcT6L1alMUokxcLOZ_PscJr7bDA0dQg8IdKIWFCWTtr07hDwGpDKSA_CNfUHNFqL7r7Kfs27esywViezCTPQ--GW4ds-ND76JSwFaQF1k",
                            width: 5312
                        }
                    ],
                    place_id: "ChIJIX5iRpyc4jARdI93G3jRfak",
                    plus_code: {
                        compound_code: "RGJG+M9 Bangkok",
                        global_code: "7P52RGJG+M9"
                    },
                    rating: 4.6,
                    reference: "ChIJIX5iRpyc4jARdI93G3jRfak",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 27
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "662 Rd, Techawanit, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8023547,
                            lng: 100.5349054
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80372907989272,
                                lng: 100.5362054298927
                            },
                            southwest: {
                                lat: 13.80102942010728,
                                lng: 100.5335057701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Kumamura Food.Bar熊村",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 1280,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/114297716055359148368">Snashy DoubleSixSeven</a>'
                            ],
                            photo_reference:
                                "Aap_uEDR4Mecd-yiHs3plFIT5d51hHpFtHIlCqb6Hf8tV_feOM2hE81juv65ozxGEQ1dE9Q8pK5O5ttYctgZueV9BoeVwYNhpDDvXYT5Rm6TGeQP4ODqU9a_6P8RRpchyi8HeCAvjxoDbGNvM-pIl06mXaNgxGRffEWsSWmUlVLTTd8Ob_g0",
                            width: 1280
                        }
                    ],
                    place_id: "ChIJdWfiWQuc4jARi2oLVe-QNGs",
                    plus_code: {
                        compound_code: "RG2M+WX Bangkok",
                        global_code: "7P52RG2M+WX"
                    },
                    rating: 4.3,
                    reference: "ChIJdWfiWQuc4jARi2oLVe-QNGs",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 140
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "889 ศูนย์การค้าเซ็นทรัลวงศ์สว่าง ชั้น 2, ถนน พิบูลย์สงคราม Bang Sue, Bangkok, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8265205,
                            lng: 100.5283959
                        },
                        viewport: {
                            northeast: {
                                lat: 13.82775842989272,
                                lng: 100.5296234298927
                            },
                            southwest: {
                                lat: 13.82505877010728,
                                lng: 100.5269237701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "MK Restaurants",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 720,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/110663754470616279251">Janny SJ</a>'
                            ],
                            photo_reference:
                                "Aap_uEBIaAgWYlf_yTNjn9i9T1L2wD89lV0Hn3Rl71vlA2cjVx0h7ldOHmeW3J2BmLa_vRErhVLPnG6iFPoKE22sYpBNM2MMvj11FL0RQJGUm2hbSVNBCA7ELY6c09e29VTDJrLlUxiYms7wGRfmIuFbzuc1YyBxlAWYnsYK9cczkhKQalaa",
                            width: 1280
                        }
                    ],
                    place_id: "ChIJfUn8_Iqb4jARJ0b5xHen7SY",
                    plus_code: {
                        compound_code: "RGGH+J9 Bangkok",
                        global_code: "7P52RGGH+J9"
                    },
                    price_level: 2,
                    rating: 3.9,
                    reference: "ChIJfUn8_Iqb4jARJ0b5xHen7SY",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 15
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "Rest Area, Pracha Chuen, Wong Sawang, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8411814,
                            lng: 100.5338511
                        },
                        viewport: {
                            northeast: {
                                lat: 13.84249592989272,
                                lng: 100.5352307298927
                            },
                            southwest: {
                                lat: 13.83979627010728,
                                lng: 100.5325310701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Burger King - Rest Area Prachachuen",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 4032,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/111033966566359969465">A Google User</a>'
                            ],
                            photo_reference:
                                "Aap_uEBZm8Sl2R0X4zSQF8dE77uqn0VVFsjpASC8bANdi8Kx1kaj7cUxDG1Dl_MfN2TfODHp6TIRUpO1o4cKGK0QZ7t242nYBkrzAmN2Y42lIjHKgfEJHZIDPUkKzun33QbMPE_9EbIRXyQ7I_zQBcMP4ZJmXZQ47-oEBbyTJONUJIOPFnl1",
                            width: 3024
                        }
                    ],
                    place_id: "ChIJj94maJyc4jARtT0NHVnMqQ8",
                    plus_code: {
                        compound_code: "RGRM+FG Bangkok",
                        global_code: "7P52RGRM+FG"
                    },
                    price_level: 2,
                    rating: 4.3,
                    reference: "ChIJj94maJyc4jARtT0NHVnMqQ8",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 832
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "1, หอพักพัฒน์ลัดดา 218/1 Wong Sawang 11 Alley, Khwaeng Wong Sawang, Khet Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.823458,
                            lng: 100.5160893
                        },
                        viewport: {
                            northeast: {
                                lat: 13.82482372989272,
                                lng: 100.5174220298927
                            },
                            southwest: {
                                lat: 13.82212407010728,
                                lng: 100.5147223701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Oh Yes Steak",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 3024,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/101150600729298509904">suparee panyuu</a>'
                            ],
                            photo_reference:
                                "Aap_uED7uhCE8wp9hTD5vUXQAWf2BX1u93jdt4iN3bQadpM4s_PURNuWJu1fF9wJUQv6edwWLj24VqckXpc8_L_CoeLxiiJzAzn70kdcv8VdmEqEnuNTarwBY5h6XjzY1n6h9CLWsEmRLuFrIWX9EqYziSYV2mGphsmw8p7MlUl4qQxDxLo_",
                            width: 4032
                        }
                    ],
                    place_id: "ChIJZdZs-5yb4jAR-iTkgbF8hdQ",
                    plus_code: {
                        compound_code: "RGF8+9C Bangkok",
                        global_code: "7P52RGF8+9C"
                    },
                    rating: 4.1,
                    reference: "ChIJZdZs-5yb4jAR-iTkgbF8hdQ",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 28
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "162/1-2,168, 10 Pracha Rat Sai 2 Rd, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8059012,
                            lng: 100.5242832
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80747702989272,
                                lng: 100.5256332298927
                            },
                            southwest: {
                                lat: 13.80477737010728,
                                lng: 100.5229335701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Shabushi by Oishi",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 2976,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/102760442298174871266">เอกภาพ พลเตชา</a>'
                            ],
                            photo_reference:
                                "Aap_uED-U7VUDJ7UhBQsJffnHRZPQb_UuepHbCInUFsv_WfXa72aErufRSjBuKOrz2IGK3c2M_A1bi-3lXBxvpPqDkbX9Zc_mAYWD8TTDJKPxY5AqKsjfN2lbUTwrYH_5RnFtahcjsqPxd0Lej4qyU_QYMTdGi9LYQii-YIJ4So1DtABef0b",
                            width: 3968
                        }
                    ],
                    place_id: "ChIJQ0k8V_qb4jAR6XLv2ryFtvQ",
                    plus_code: {
                        compound_code: "RG4F+9P Bangkok",
                        global_code: "7P52RG4F+9P"
                    },
                    price_level: 2,
                    rating: 3.9,
                    reference: "ChIJQ0k8V_qb4jAR6XLv2ryFtvQ",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 28
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "เลขที่ 2 ซอย กานต์ประภา Khwaeng Bang Sue, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8091635,
                            lng: 100.5349305
                        },
                        viewport: {
                            northeast: {
                                lat: 13.81054292989272,
                                lng: 100.5362778298927
                            },
                            southwest: {
                                lat: 13.80784327010728,
                                lng: 100.5335781701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "ครัวบางซื่อ",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 450,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/100254247938855818053">Kanogwan Maungbunsri</a>'
                            ],
                            photo_reference:
                                "Aap_uEDdk6Oaonuq4yLdrK9Y0SlwBm3hwgU6zvDG5bxsSkrLqafb2NszLHi4zwmMGIsvLNSDL8eKFM1A3nVCq1aDdaFX5Qy_bxDwvsDrs9dc2RypM2CdQXnoH2vMOV13yFoe9_4uPoQvYBTO5pOyDKzS3F6Opb8DriYQqTehS_h84sFWyolw",
                            width: 462
                        }
                    ],
                    place_id: "ChIJ4dkY766d4jARNfbGtmHVEKM",
                    plus_code: {
                        compound_code: "RG5M+MX Bangkok",
                        global_code: "7P52RG5M+MX"
                    },
                    rating: 4.5,
                    reference: "ChIJ4dkY766d4jARNfbGtmHVEKM",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 11
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "4 คอนโดยูดีไลท์ 2 Shop ปาก Soi Praha Chuen 19, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8189679,
                            lng: 100.535996
                        },
                        viewport: {
                            northeast: {
                                lat: 13.82028642989272,
                                lng: 100.5374890798927
                            },
                            southwest: {
                                lat: 13.81758677010728,
                                lng: 100.5347894201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Come Home",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 960,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/106759193758994069597">Cafe&#39; La Vela</a>'
                            ],
                            photo_reference:
                                "Aap_uED-xaInfTMC6lGMZOsuHKBI41uhu-xO61QXqYOI3KiFvdt8OdMFsspo1EdlXIgK8QOsukrTHCd_lYo7pyxuzdTWeh0ON70sTxKbhCdoZ2LiKMNLx8CmrvbajkinHH9pR2bhO0HwG8nTpPKQBMR_ROwX9zCLkbUO4P3drqqnWfKDdLFB",
                            width: 720
                        }
                    ],
                    place_id: "ChIJ5-YV6Xuc4jARXI2YW2JufKw",
                    plus_code: {
                        compound_code: "RG9P+H9 Bangkok",
                        global_code: "7P52RG9P+H9"
                    },
                    rating: 4.4,
                    reference: "ChIJ5-YV6Xuc4jARXI2YW2JufKw",
                    types: [
                        "restaurant",
                        "cafe",
                        "food",
                        "health",
                        "point_of_interest",
                        "store",
                        "establishment"
                    ],
                    user_ratings_total: 104
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "829 ห้องเลขที่ 103, ถ.ประชาราษฎร์ 2, แขวงบางซื่อ เขตบางซื่อ กรุงเทพฯ, 10800 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8059946,
                            lng: 100.5240115
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80752382989272,
                                lng: 100.5253614798927
                            },
                            southwest: {
                                lat: 13.80482417010728,
                                lng: 100.5226618201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Hachiban Ramen",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 3024,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/111488529893864735262">Atthakrit Atireklapsakul</a>'
                            ],
                            photo_reference:
                                "Aap_uEDDtSqu40uRJ9zOY0EX-p7PyBRgaO1q0xRDbnl1MJeAKk2ROSziHXCF1IaJjo3kz25Kqks267qoRfr-83VkW9wssDh4SblGuy2230u2rrYDfLMXCk3stCl8jnWksPpW4-BakrXO3j-7QuGLTebrGvlhmyP0E2P7Qgy8te2xbCevfrCb",
                            width: 4032
                        }
                    ],
                    place_id: "ChIJIRYkY4qb4jARJiHDwpwTdbg",
                    plus_code: {
                        compound_code: "RG4F+9J Bangkok",
                        global_code: "7P52RG4F+9J"
                    },
                    rating: 4.4,
                    reference: "ChIJIRYkY4qb4jARJiHDwpwTdbg",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 20
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "ใต้หอพัก Groove residences, Wong Sawang, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8249331,
                            lng: 100.5164839
                        },
                        viewport: {
                            northeast: {
                                lat: 13.82628062989272,
                                lng: 100.5178360798927
                            },
                            southwest: {
                                lat: 13.82358097010728,
                                lng: 100.5151364201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "มั่งมีเกี๊ยวซ่า สาขาหลังม.พระจอมเกล้าพระนครเหนือ",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 1728,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/114883555288335098338">plekaple ka</a>'
                            ],
                            photo_reference:
                                "Aap_uED9ePqHvjtLl2yywMGGQ38XDUPsOQ2XKfNtOnuvAJxO-9MDxj4QO5k3qt6wi1LTtfogcp0ec4DeOBTx2FwX4jon3QGBJ9MXsG7nuGUeP7boEANMvHkaHiiuNVbOnUGCIqmkvnW23GFjJasEW60idAs2g0JYVWLtPxbf9GeqSXBoxVQB",
                            width: 1296
                        }
                    ],
                    place_id: "ChIJRfJyTJeb4jAR6KkINuSPpTw",
                    plus_code: {
                        compound_code: "RGF8+XH Bangkok",
                        global_code: "7P52RGF8+XH"
                    },
                    rating: 5,
                    reference: "ChIJRfJyTJeb4jAR6KkINuSPpTw",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 1
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "10 Soi Ngamwongwan 6,Yaek 21, Bang Khen, Mueang Nonthaburi District, Nonthaburi 11000, Thailand",
                    geometry: {
                        location: {
                            lat: 13.843703,
                            lng: 100.529047
                        },
                        viewport: {
                            northeast: {
                                lat: 13.84510917989272,
                                lng: 100.5303923298927
                            },
                            southwest: {
                                lat: 13.84240952010728,
                                lng: 100.5276926701073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "The Best",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 2752,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/114555624785363972371">Jiraporn J.</a>'
                            ],
                            photo_reference:
                                "Aap_uEDUGCrL8kfoON4G7_Ow6kYPBR0FJyiiXpiw9YUVILxGtPPBywMQxuBvoJQTtuI4G3hFHGXT6epX0svXGyulyonQgHy8bO5pW5fteu-tStVIwveDQ6eNDlPEXcBUxr4fyyNUuJSHPZ3a-PSoShnnNWrN05tX7NzU1Wexny--_ocfXulA",
                            width: 5664
                        }
                    ],
                    place_id: "ChIJC2_PyGGb4jAR_OkKGVyURPY",
                    plus_code: {
                        compound_code:
                            "RGVH+FJ Nonthaburi, Mueang Nonthaburi District, Nonthaburi",
                        global_code: "7P52RGVH+FJ"
                    },
                    rating: 4.4,
                    reference: "ChIJC2_PyGGb4jAR_OkKGVyURPY",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 64
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "977 ถ. กรุงเทพ - นนทบุรี Wong Sawang, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.822462,
                            lng: 100.5325352
                        },
                        viewport: {
                            northeast: {
                                lat: 13.82380332989272,
                                lng: 100.5339403798927
                            },
                            southwest: {
                                lat: 13.82110367010728,
                                lng: 100.5312407201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/cafe-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/cafe_pinlet",
                    name: "Sweet Maple Cafe'",
                    opening_hours: {
                        open_now: true
                    },
                    photos: [
                        {
                            height: 3968,
                            html_attributions: [
                                '<a href="https://maps.google.com/maps/contrib/101694762554198689391">A Google User</a>'
                            ],
                            photo_reference:
                                "Aap_uEBo4cv4BKVbFoYqCS0Omnr74-rOsewFOZC9FOJ0nW4o41FlnfaVN8EStYPnITG1gjrHHX5nqfzvXlaUlrZGRVZWPB-AA7LzVPhpnHoT6PNb0fRcuhgVTOjzglOJVYncAaeO-fU_qSngwlBijrmPx1Q-AI_9mV1dXvLkO3p0HBYJuJKo",
                            width: 2976
                        }
                    ],
                    place_id: "ChIJv-_N_H6c4jARxRdLuJGaf5o",
                    plus_code: {
                        compound_code: "RGCM+X2 Bangkok",
                        global_code: "7P52RGCM+X2"
                    },
                    price_level: 2,
                    rating: 4.7,
                    reference: "ChIJv-_N_H6c4jARxRdLuJGaf5o",
                    types: [
                        "cafe",
                        "bakery",
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "store",
                        "establishment"
                    ],
                    user_ratings_total: 60
                },
                {
                    business_status: "OPERATIONAL",
                    formatted_address:
                        "257, 24 Pracha Rat Sai 2 Rd, Bang Sue, Bangkok 10800, Thailand",
                    geometry: {
                        location: {
                            lat: 13.8069572,
                            lng: 100.5267591
                        },
                        viewport: {
                            northeast: {
                                lat: 13.80830857989272,
                                lng: 100.5281519798927
                            },
                            southwest: {
                                lat: 13.80560892010728,
                                lng: 100.5254523201073
                            }
                        }
                    },
                    icon:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v1/png_71/restaurant-71.png",
                    icon_background_color: "#FF9E67",
                    icon_mask_base_uri:
                        "https://maps.gstatic.com/mapfiles/place_api/icons/v2/restaurant_pinlet",
                    name: "Salmon Quiz | ปลาส้มข้อสอบ",
                    place_id: "ChIJDx7LMgKb4jARlFy70a7j_VM",
                    plus_code: {
                        compound_code: "RG4G+QP Bangkok",
                        global_code: "7P52RG4G+QP"
                    },
                    rating: 0,
                    reference: "ChIJDx7LMgKb4jARlFy70a7j_VM",
                    types: [
                        "restaurant",
                        "food",
                        "point_of_interest",
                        "establishment"
                    ],
                    user_ratings_total: 0
                }
            ];
        },

        distance(coords) {
            // var lat1 = 13.69;
            // var lon1 = 100.6347;
            var lat1 = this.coordinates.lat;
            var lon1 = this.coordinates.lng;
            var lat2 = coords.lat;
            var lon2 = coords.lng;

            var radlat1 = (Math.PI * lat1) / 180;
            var radlat2 = (Math.PI * lat2) / 180;
            var theta = lon1 - lon2;
            var radtheta = (Math.PI * theta) / 180;
            var dist =
                Math.sin(radlat1) * Math.sin(radlat2) +
                Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
            dist = Math.acos(dist);
            dist = (dist * 180) / Math.PI;
            dist = dist * 60 * 1.1515;
            dist = dist * 1.609344;

            return dist;
        },

        setPages() {
            let numberOfPages = Math.ceil(
                this.restaurants.length / this.perPage
            );
            for (let index = 1; index <= numberOfPages; index++) {
                this.pages.push(index);
            }
        },
        paginate(restaurants) {
            let page = this.page;
            let perPage = this.perPage;
            let from = page * perPage - perPage;
            let to = page * perPage;
            return restaurants.slice(from, to);
        }
    },
    computed: {
        displayedrestaurants() {
            return this.paginate(this.restaurants);
        }
    },
    watch: {
        restaurants() {
            this.setPages();
        }
    },
    created() {
        // this.getrestaurants();

        this.$getLocation({}).then(coordinates => {
            console.log(coordinates);
            this.coordinates = coordinates;
        });
    },
    filters: {
        trimWords(value) {
            return (
                value
                    .split(" ")
                    .splice(0, 20)
                    .join(" ") + "..."
            );
        }
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

button.page-link {
    display: inline-block;
    font-size: 20px;
    background-color: #fff;
}

button.page-link:focus {
    outline: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    background-color: #fff;
}

.offset {
    width: 500px !important;
    margin: 20px auto;
}

/* Style the tabs */
.tabs {
    overflow: hidden;
    margin-left: 20px;
    margin-bottom: -2px;
}

.tabs ul {
    list-style-type: none;
    margin-left: 20px;
}

.tabs a {
    float: left;
    cursor: pointer;
    padding: 12px 24px;
    transition: background-color 0.2s;
    border: 1px solid #ccc;
    border-right: none;
    background-color: #f1f1f1;
    border-radius: 10px 10px 0 0;
    font-weight: bold;
}
.tabs a:last-child {
    border-right: 1px solid #ccc;
}

/* Change background color of tabs on hover */
.tabs a:hover {
    background-color: #aaa;
    color: #fff;
}

/* Styling for active tab */
.tabs a.active {
    background-color: #fff;
    color: #484848;
    border-bottom: 2px solid #fff;
    cursor: default;
}

/* Style the tab content */
.tabcontent {
    padding: 30px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 3px 3px 6px #e1e1e1;
    background-color: rgb(255, 255, 255);
}
</style>
