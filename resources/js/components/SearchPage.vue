<template>
    <div class="bg">
        <navbar></navbar>

        <!-- TOP SECTION -->
        <!-- HEADER & LOCATION -->

        <div class="search-page-wrapper container-fluid">
            <div class="row justify-content-center">
                <div class="col-5 mt-5 text-center">
                    <h1 class="search-page-header">
                        Search Restaurant
                    </h1>
                    <p class="search-page-description">
                        current location lat:{{ this.coordinates.lat }} lng:{{
                            this.coordinates.lng
                        }}
                    </p>
                </div>
            </div>

            <!-- MID SECTION -->
            <!-- SEARCH BAR -->

            <div class="row justify-content-center mt-5">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="search-wrapper container">
                        <div id="tabs">
                            <div class="tabs">
                                <a
                                    v-on:click="activetab = 1"
                                    v-bind:class="[
                                        activetab === 1 ? 'active' : ''
                                    ]"
                                    >Keyword search</a
                                >
                                <a
                                    v-on:click="activetab = 2"
                                    v-bind:class="[
                                        activetab === 2 ? 'active' : ''
                                    ]"
                                >
                                    Radius Search</a
                                >
                            </div>

                            <div class="content">
                                <div v-if="activetab === 1" class="tabcontent">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8 mb-1 px-0 mx-3">
                                            <div class="form-group">
                                                <label for="keyword-input">
                                                    <small
                                                        >keyword</small
                                                    ></label
                                                >
                                                <input
                                                    id="keyword-input"
                                                    type="search"
                                                    class="form-control"
                                                    placeholder="Search"
                                                    aria-label="Search"
                                                    aria-describedby="search-addon"
                                                    v-model="keyword"
                                                    :class="{
                                                        'form-control': true,
                                                        'is-invalid': !validKeyword(
                                                            keyword
                                                        )
                                                    }"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-1 px-0 mx-3">
                                            <div class="form-group">
                                                <label for="keyword-button">
                                                    <small>
                                                        &nbsp;&nbsp;</small
                                                    ></label
                                                >

                                                <button
                                                    id="keyword-button"
                                                    type="button mx-2 "
                                                    class="btn btn-primary btn-block"
                                                    v-on:click.stop.prevent="
                                                        submit()
                                                    "
                                                >
                                                    search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="activetab === 2" class="tabcontent">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mb-1 px-0 mx-1">
                                            <div class="form-group">
                                                <label for="radius-input">
                                                    <small
                                                        >Location (default is
                                                        your location)</small
                                                    ></label
                                                >
                                                <GmapAutocomplete
                                                    @place_changed="setPlace"
                                                    placeholder="Enter a location"
                                                    id="radius-input"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-1 px-0 mx-1">
                                            <div class="form-group">
                                                <label for="radius-select">
                                                    <small
                                                        >radius(km)</small
                                                    ></label
                                                >
                                                <select
                                                    class="form-select"
                                                    v-model="radius"
                                                    id="radius-select"
                                                >
                                                    <option value="1"
                                                        >1km</option
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
                                            </div>
                                        </div>
                                        <div class="col-md-2  px-0 mx-1">
                                            <div class="form-group">
                                                <label for="radius-select">
                                                    <small>
                                                        &nbsp;&nbsp;</small
                                                    ></label
                                                >
                                                <button
                                                    id="radius-button"
                                                    type="button mx-2 mb-1"
                                                    class="btn btn-primary btn-block"
                                                    @click="getnear()"
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

            <!-- LOWER SECTION -->
            <!-- RESTAURANTS LIST -->

            <restauranlist
                :restaurants="restaurants"
                :pages="pages"
                :coordinates="coordinates"
            ></restauranlist>

        </div>
    </div>
</template>

<script>
import restauranlist from "./RestaurantList.vue";

export default {
    components: {
        restauranlist
    },

    data() {
        return {
            //restaurants data
            restaurants: [],
            //current user location
            coordinates: {
                lat: "",
                lng: ""
            },
            currentPlace: null,
            //current active search tab (1 = keyword search, 2 = radius search)
            activetab: 1,
            //radius search value (km)
            radius: "1",
            //search input value(default = Bangsue)
            keyword: "Bangkok",
            //search input validate
            valid: false
        };
    },

    methods: {
        //validate search input
        validate: function() {
            if (this.validKeyword(this.keyword)) {
                this.valid = true;
            }
        },
        validKeyword: function(str) {
            //check if str is not null,undifined,whitespace
            return !(!str || str.length === 0);
        },
        submit: function() {
            this.validate();
            if (this.valid) {
                this.getrestaurants();
            }
        },

        //get restaurants data by keyword(s), put the value in restaurants array and reset the list that was currently shown
        async getrestaurants() {
            //reset restaurants data
            this.restaurants = [];
            var url = "/api/v1/restaurants/";
            //replace all with space with % for query
            var params = { keyword: this.keyword.replace(" ", "%") };
            //call api
            this.$http.get(url, { params: params }).then(response => {
                this.restaurants = response.data;
            });
            //reset list
            this.pages = [];
        },

        setPlace(place) {
            this.currentPlace = place;
        },

        //call get restaurants data by current location and radius, put the value in restaurants array and reset the list that was currently shown
        async getnear() {
            console.log(this.currentPlace);

            //reset restaurants data
            this.restaurants = [];

            var lat;
            var lng;

            //use current coordinates instead if currentPlace is null
            if (this.currentPlace) {
                console.log("use cur");
                lat = this.currentPlace.geometry.location.lat();
                lng = this.currentPlace.geometry.location.lng();
            } else {
                console.log("use def");
                console.log(this.coordinates);
                lat = this.coordinates.lat;
                lng = this.coordinates.lng;
            }

            var url = "/api/v1/restaurantsnear/";
            //add string for query
            var params = {
                location: lat + "%2c" + lng,
                radius: this.radius
            };
            //call api
            this.$http.get(url, { params: params }).then(response => {
                this.restaurants = response.data;
            });
            //reset list
            this.pages = [];
        }
    },

    created() {
        //get current user location VueGeolocation
        this.$getLocation({}).then(coordinates => {
            this.coordinates = coordinates;
        });

        //init restaurants data (Bangsue)
        this.getrestaurants();
    }
};
</script>

<style scoped>
.search-page-header {
    font-family: Consolas, monaco, monospace;
    font-weight: 600;
    font-size: 3rem;
}

.search-page-description {
}

.bg {
    background-color: #f5f5f5;
    background-image: url("../../../public/map-bg.png");
    height: 100vh;
    /* width: 100vw; */
    overflow: auto;
}

/* Style the tabs */
.tabs {
    overflow: hidden;
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
    padding: 10px 30px 10px 30px;
    border: 1px solid #ccc;
    border-radius: 0px 10px 10px 10px;
    box-shadow: 3px 3px 6px #e1e1e1;
    background-color: rgb(255, 255, 255);
}

/* Styling for google map auto complete */
.pac-target-input {
    width: 100%;
    padding: 8px;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
    border: 1px solid #ced4da;
}

/* Styling for Select */
.form-select {
    display: block;
    width: 100%;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
    -moz-padding-start: calc(0.75rem - 3px);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
</style>
