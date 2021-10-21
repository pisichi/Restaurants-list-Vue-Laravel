<template>
    <div class="container-fluid">
        <!-- RESTAURANT LIST HEADER ELEMENT-->

        <div class="row justify-content-center my-5">
            <div
                class="result-wrapper container col col-lg-8 col-md-10 col-sm-12 "
            >
                <div class="row justify-content-center">
                    <div class="col-12 list-header p-3">
                        <div class="row">
                            <div class="col text-left"></div>
                            <div class="col text-center">
                                <h5>search result</h5>
                            </div>
                            <div class="col text-right"></div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <!-- RESTAURANT LIST ELEMENT-->
                    <!-- TODO: Create seperate component-->
                    <ul class="list-group col-10">
                        <li
                            v-for="(item, idx) in displayedrestaurants"
                            :key="idx"
                            class="list-group-item my-2 p-3"
                        >
                            <div class="list-card">
                                <!-- PHOTO SECTION-->

                                <div class="meta">
                                    <div
                                        class="photo"
                                        :style="
                                            'background-image:url(' +
                                                checkImage(item) +
                                                ');'
                                        "
                                    ></div>

                                    <ul class="details">
                                        <li class="review">
                                            {{ item.rating }}
                                        </li>
                                        <li class="users">
                                            {{ item.user_ratings_total }}
                                        </li>
                                        <li class="tags">
                                            <ul>
                                                <li
                                                    class="mx-1"
                                                    v-for="(tag,
                                                    idx) in item.types"
                                                    :key="idx"
                                                >
                                                    <a>{{ tag }}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END PHOTO SECTION-->

                                <!-- DESCRIPTION SECTION-->

                                <div class="description">
                                    <h1>
                                        {{ item.name }}
                                    </h1>
                                    <h2>
                                        {{ distance(item.geometry.location) }}
                                        km
                                    </h2>

                                     <!-- keyword search and radius search has different address key/format-->
                                     <!-- keyword = formatted_address and radius = vicinity -->

                                    <p v-if="item.formatted_address !== null">
                                        {{ item.formatted_address }}
                                    </p>
                                    <p v-if="item.vicinity !== null">
                                        {{ item.vicinity }}
                                    </p>
                                    <p class="read-more">
                                        <a
                                            @click="
                                                openMap(
                                                    item.geometry.location,
                                                    item.place_id
                                                )
                                            "
                                            >open map</a
                                        >
                                    </p>
                                </div>
                                <!-- END DESCRIPTION SECTION-->
                            </div>
                        </li>
                        <!--END  RESTAURANT LIST ELEMENT-->
                    </ul>
                </div>

                <!-- PAGINATION BOTTOM-->
                <div class="row justify-content-center">
                    <!-- PAGINATION ELEMENT-->
                    <!-- TODO: Create seperate component-->
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
                    <!--END PAGINATION ELEMENT-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        //restaurants data
        restaurants: [],
        //currenttly shown lists
        pages: [],
        //Client location
        coordinates: Object
    },

    data() {
        return {
            //current page
            page: 1,
            //restaurant list per page
            perPage: 5,
            //google map api (for demonstration only)
            google_api: "AIzaSyAUPxyRExhTiYE3jBa4cA72IzVyvpO3TF0"
        };
    },

    methods: {
        //open googlemap for restaurant in new tab using simple link
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

        //calculate the distance between client location and restaurant location
        //https://www.htmlgoodies.com/javascript/calculate-the-distance-between-two-points-in-your-web-apps/
        distance(coords) {
            //client location
            var lat1 = this.coordinates.lat;
            var lon1 = this.coordinates.lng;
            //restaurant location
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

            //format float to 2 digits
            return Math.round(dist * 100) / 100;
        },

        //set page index
        setPages() {
            let numberOfPages = Math.ceil(
                this.restaurants.length / this.perPage
            );
            for (let index = 1; index <= numberOfPages; index++) {
                this.pages.push(index);
            }
        },

        //scroll to top (doesn't work)
        // Make the page sctoll to top when the page value has changed
        // scrollTop() {
        //    
        //     Vue.prototype.$scrollToTop = () => window.scrollTo(0, 0);
        // },

        //pagination stuff
        paginate(restaurants) {
            let page = this.page;
            let perPage = this.perPage;
            let from = page * perPage - perPage;
            let to = page * perPage;
            return restaurants.slice(from, to);
        },

        // check if image value of the restaurant exist or not
        // if not, return placeholder url
        checkImage(item) { 
            if ("photos" in item)
                return (
                    "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photo_reference=" +
                    item.photos[0].photo_reference +
                    "&key=" +
                    this.google_api
                );
            else {
                return "https://t4.ftcdn.net/jpg/02/07/87/79/360_F_207877921_BtG6ZKAVvtLyc5GWpBNEIlIxsffTtWkv.jpg";
            }
        }
    },
    computed: {
        //current page restaurants list
        displayedrestaurants() {
            return this.paginate(this.restaurants);
        }
    },
    watch: {
        //if restaurants value has changed, set page
        restaurants() {
            this.setPages();
        }
    },
    created() {}
};
</script>

<style scoped>
/* Frosty glass effect */
.result-wrapper {
    box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    background: inherit;
    overflow: auto;
    overflow-x: hidden;
    max-width: 1000px;
}

.result-wrapper:before {
    box-shadow: 0 0 1rem 0 rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    background-color: #f5f5f5;
    overflow: auto;
    overflow-x: hidden;
    max-width: 100px;
}

/* Style the Lists */

.list-card {
    display: flex;
    flex-direction: column;
    margin: 1rem auto;
    box-shadow: 0 3px 7px -1px rgba(0, 0, 0, 0.1);
    margin-bottom: 1.6%;
    background: #fff;
    line-height: 1.4;
    font-family: sans-serif;
    border-radius: 5px;
    overflow: hidden;
    z-index: 0;
}
.list-card a {
    color: inherit;
}
.list-card a:hover {
    color: #5ad67d;
}
.list-card:hover .photo {
    transform: scale(1.3) rotate(3deg);
}
.list-card .meta {
    position: relative;
    z-index: 0;
    height: 200px;
}
.list-card .photo {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-size: cover;
    background-position: center;
    transition: transform 0.2s;
}
.list-card .details,
.list-card .details ul {
    margin: auto;
    padding: 0;
    list-style: none;
}
.list-card .details {
    position: absolute;
    top: 0;
    bottom: 0;
    left: -100%;
    margin: auto;
    transition: left 0.2s;
    background: rgba(0, 0, 0, 0.6);
    color: #fff;
    padding: 10px;
    width: 100%;
    font-size: 0.9rem;
}
.list-card .details a {
    text-decoration: dotted underline;
}
.list-card .details ul li {
    display: inline-block;
}
.list-card .details .users:before {
    font-family: FontAwesome;
    margin-right: 10px;
    content: "\f007";
}
.list-card .details .review:before {
    font-family: FontAwesome;
    margin-right: 10px;
    content: "\f005";
    color: #fac000;
}
.list-card .details .tags ul:before {
    font-family: FontAwesome;
    content: "\f02b";
    margin-right: 10px;
}
.list-card .details .tags li {
    margin-right: 2px;
}
.list-card .details .tags li:first-child {
    margin-left: -4px;
}
.list-card .description {
    padding: 1rem;
    background: #fff;
    position: relative;
    z-index: 1;
}
.list-card .description h1,
.list-card .description h2 {
    font-family: Poppins, sans-serif;
}
.list-card .description h1 {
    line-height: 1;
    margin: 0;
    font-size: 1.3rem;
}
.list-card .description h2 {
    font-size: 1rem;
    font-weight: 300;
    text-transform: uppercase;
    color: #a2a2a2;
    margin-top: 5px;
}
.list-card .description .read-more {
    text-align: right;
    cursor: pointer;
}
.list-card .description .read-more a {
    color: #5ad67d;
    display: inline-block;
    position: relative;
}
.list-card .description .read-more a:after {
    content: "\f08e";
    font-family: FontAwesome;
    margin-left: -10px;
    opacity: 0;
    vertical-align: middle;
    transition: margin 0.3s, opacity 0.3s;
}
.list-card .description .read-more a:hover:after {
    margin-left: 5px;
    opacity: 1;
}
.list-card p {
    position: relative;
    margin: 1rem 0 0;
}
.list-card p:first-of-type {
    margin-top: 1.25rem;
}
.list-card p:first-of-type:before {
    content: "";
    position: absolute;
    height: 5px;
    background: #5ad67d;
    width: 35px;
    top: -0.75rem;
    border-radius: 3px;
}
.list-card:hover .details {
    left: 0%;
}
@media (min-width: 640px) {
    .list-card {
        flex-direction: row;
        max-width: 700px;
    }
    .list-card .meta {
        flex-basis: 40%;
        height: auto;
    }
    .list-card .description {
        flex-basis: 60%;
    }
    .list-card .description:before {
        transform: skewX(-3deg);
        content: "";
        background: #fff;
        width: 30px;
        position: absolute;
        left: -10px;
        top: 0;
        bottom: 0;
        z-index: -1;
    }
}

/* Style the Pagination */

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
</style>
