@extends('frontend.layouts.frontend_main')
@section('title') Park AnyWhere @endsection
@section('css')

@endsection
@section('content')
    {{-- Main Wrapper Start Hero Section--}}
    <div class="main backimg">
        <div class="container bookbox">
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#hourly">HOURLY/DAILY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link monthly" data-toggle="tab" href="#monthly">MONTHLY</a>
                </li>
            </ul>
            <h1 class="findtextone">Find parking in seconds</h1>
            <h5 class="findtexttwo" style="text-align:justify; text-align:center;">Choose from millions of available
                spaces, or reserve your space in advance. <br> Join over 3.5 million drivers enjoying easy parking.
            </h5>

            <div class="tab-content">
                <form id="hourly" role="tab-panel" class="container tab-pane active booking-form" method="get">
                    <div class="form-group">
                        <div class="form-destination">
                            <label for="destination">PARKING AT</label>
                            {{-- <input type="text" id="destination" name="destination" placeholder="EG. Dhaka" /> --}}
                            <select id="lication" name="location_zone_name" class="form-control">
                                @foreach ($zone_location as $element)
                                    <option
                                        value="{{$element->location_zone_id}}">{{$element->location_zone_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        {{--                             <div class="form-date-from form-icon">
                                                        <label for="date_from">From Date</label>
                                                        <input type="text" id="date_from" class="date_from" placeholder="Pick a date" />
                                                    </div>
                                                    <div class="form-date-to form-icon">
                                                        <label for="date_to">To Date</label>
                                                        <input type="text" id="date_to" class="date_to" placeholder="Pick a date" />
                                                    </div> --}}
                        <div class="form-submit">
                            <input type="submit" id="submit" class="submit" value="Show Parking"/>
                        </div>
                    </div>
                </form>
                <form id="monthly" role="tab-panel" class="container tab-pane fade booking-form" method="POST">
                    <div class="form-group">
                        <div class="form-destination">
                            <label for="destination">PARKING AT</label>
                            <input type="text" id="destination" name="destination" placeholder="EG. Dhaka"/>
                        </div>
                        <div class="form-date-from form-icon">
                            <label for="date_from">From Date</label>
                            <input type="text" id="date_from" class="date_from" placeholder="Pick a date"/>
                            {{-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span>
                            --}}
                        </div>
                        <div class="form-date-to form-icon">
                            <label for="date_to">To Date</label>
                            <input type="text" id="date_to" class="date_to" placeholder="Pick a date"/>
                        </div>
                        <div class="form-submit">
                            <input type="submit" id="submit" class="submit" value="Show Parking"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Main Wrapper Start Hero Section--}}

    <div class="row">
        <!-- PARKING PLACES -->
        <div style="margin-left: 50px" class="col-sm-12">
            <div class="profiles-details">
                <table class="table table-condensed table-bordered table-hover">
                    <thead>
                    <tr class="bg-indigo">
                        <th><i class="glyphicon glyphicon-flag"></i> Parking Lots</th>
                        <th class="hidden-xs">Total</th>
                        <th class="hidden-xs">Booking</th>
                        <th>Available</th>
                        <th><i class="material-icons">Action</i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($parkingzone as $parking_data)
                        <tr>
                            <th data-geolocation="{{$parking_data->parking_zone_id}},{{$parking_data->latitude}},{{$parking_data->longitude}}"
                                data-title="Zakir Food Factory" class="showMapByGeoLocation"
                                style="cursor: pointer; word-wrap: break-word;">{{$parking_data->parking_name}}</th>
                            <td class="hidden-xs"><strong
                                    class="label label-info">{{$parking_data->parking_limit}}</strong></td>
                            @php
                                $booked = collect($parking_data->ParkingSpace->where('booking_status',1)->count());
                                 $available = collect($parking_data->ParkingSpace->where('booking_status',0)->count());
                            @endphp
                            <td class="hidden-xs"><strong class="label label-warning">{{ $booked[0] }}</strong></td>
                            <td><strong class="label label-success"> {{ $available[0] }} </strong></td>

                            <td>
                                <button class="btn btn-xs btn-primary" data-id="{{$parking_data->parking_zone_id}}"
                                        data-title="{{$parking_data->parking_name}}" data-toggle="modal"
                                        data-target="#priceModal"><i class="fas fa-dollar-sign"></i></button>
                                <button class="btn btn-xs btn-info hidden-xs showMapByGeoLocation"
                                        data-geolocation="{{$parking_data->parking_zone_id}},{{$parking_data->latitude}},{{$parking_data->longitude}}">
                                    <i class="fas fa-map-marker-alt"></i></button>
                                @guest
                                    <button class="book btn btn-sm btn-success" disabled>Booking Now</button>
                                @endguest
                                @auth
                                    <a href="{{route('booking.show',$parking_data->parking_zone_id)}}"
                                       class="btn btn-sm btn-success">Booking Now</a>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$parkingzone->links()}}
            </div>
        </div>
    </div>



    <div id="LocationMap" class="col-sm-12 mb-2">
        <div class="profiles-details">
            <h4> Google Map</h4>

            <div class="body">
                <p id="success" class="sr-only alert alert-success"></p>
                <p id="error" class="sr-only alert alert-danger"></p>

                <div class="form-group">
                    <input type="hidden" id="start" value="1">
                    <input type="text" class="form-control" id="pac-input" placeholder="Select your location">
                </div>

                <div class="form-group">
                    <div id="map" style="width:100%;height:360px"></div>
                </div>
            </div>
        </div>
    </div>


    {{-- info_section start --}}
    <div class="container-fluid">
        <h2 class="infoh2">Parking Made Easy</h2>
        <div class="row justify-content-center info_section">
            <div class="col-md-4">
                <img src="frontend_assets/images/find_parking.png" alt="">
                <h3>Wherever, whenever</h3>
                <p>
                    Choose from millions of spaces across <br>
                    the BD
                    <br>
                    Find your best option for every car <br> journey
                </p>
            </div>
            <div class="col-md-4">
                <img src="frontend_assets/images/reserve.png" alt="">
                <h3>Peace of mind</h3>
                <p>
                    View information on availability, price <br> and restrictions
                    <br>
                    Reserve in advance at over 45,000+ <br> locations
                </p>
            </div>
            <div class="col-md-4">
                <img src="frontend_assets/images/park_car.png" alt="">
                <h3>Seamless experience</h3>
                <p>
                    Pay for ParkAnyWhere spaces via the <br> app or website
                    <br>
                    Follow easy directions and access <br> instructions
                </p>
            </div>
        </div>
    </div>
    {{-- info_section stop --}}

    {{-- Download Section Start --}}
    <div class="container-fluid">
        <div class="download_section">
            <div class="information">
                <div class="overlay"></div>
                <img src="{{ asset('frontend_assets/images/mobile.png') }}" class="mobile" alt="">
                <div id="circle">
                </div>
            </div>
            <div class="controls">
                <h2>Download the Bangladeshi First Parking App</h2>

                <p class="text-muted">Rated 5 stars with an average satisfaction rating of 96%, ParkAnyWhere is the
                    First <br> Bangladeshi favourite parking service. But don’t just take our word for it – check
                    out<br> Some of the latest customer reviews below for our London parking spaces.</p>

                <h5>Enter your Email Address below <br> To receive A Mail with a link to download the free ParkAnyWhere
                    App.</h5>
                <div class="input-group mb-3 inputbar">
                    <input type="text" class="form-control" placeholder="Enter Your Email">
                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Send</button>
                    </div>
                </div>
                <div class="download">
                    <h4>OR DOWNLOAD FROM:</h5>
                        <a href=""><img src="{{ asset('frontend_assets/images/appstore.png') }}" alt="App Store"></a>
                        <a href=""><img src="{{ asset('frontend_assets/images/googleplay.png') }}"
                                        alt="Google Play"></a>
                </div>
            </div>
        </div>
        {{-- Download Section stop --}}

        {{-- Parking_Lot Section Start --}}
        <div class="row parklotimg">
            <div class="col-md-6 parklot">
                <h2>Rent out your parking space</h2>
                <p>Make easy tax free money by renting out your parking <br> space. It‘s free to list and only takes a
                    <br> few minutes to get up and running.</p>
                <button class="btn btn-success btn-lg">Learn how to earn today</button>
                <div class="parkoverlay">

                </div>
            </div>
        </div>
        {{-- Parking_Lot Section Stop --}}

        {{-- Testimonial Section Start --}}
        <section class="testimonials">
            <h1>What users are saying</h1>
            <p class="text-center">Don’t just take our word for it – check out some of the latest <br> customer reviews
                for our Bangladeshi parking spaces</p>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img class="user" src="{{ asset('frontend_assets/images/user3.jpg') }}" alt="User Image">
                        <blockquote class="blockquotetesti">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Architecto, minima pariatur porro quaerat earum eius ex reiciendis ratione laborum repellat
                            enim quisquam aut quidem ullam incidunt harum mollitia fugit officiis!
                        </blockquote>
                        <h3>JAHID Bhuiyan <span class="designation">CarPark on BoardStreet</span></h3>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img class="user" src="{{ asset('frontend_assets/images/user1.jpg') }}" alt="User Image">
                        <blockquote class="blockquotetesti">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Architecto, minima pariatur porro quaerat earum eius ex reiciendis ratione laborum repellat
                            enim quisquam aut quidem ullam incidunt harum mollitia fugit officiis!
                        </blockquote>
                        <h3>Hridoy Sarkar <span class="designation">CEO At ParkManage</span></h3>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img class="user" src="{{ asset('frontend_assets/images/user2.jpg') }}" alt="User Image">
                        <blockquote class="blockquotetesti">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Architecto, minima pariatur porro quaerat earum eius ex reiciendis ratione laborum repellat
                            enim quisquam aut quidem ullam incidunt harum mollitia fugit officiis!
                        </blockquote>
                        <h3>Nipen Mozumder <span class="designation">CEO At Driveway</span></h3>

                    </div>
                </div>
            </div>
    </div>
    </section>
    {{-- Testimonial Section Stop --}}



    <div class="modal fade" id="priceModal" tabindex="-1" role="dialog" aria-labelledby="priceModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="priceModalLabel"></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



@endsection

@section('js')


    <script type="text/javascript">
        $(document).ready(function () {
            $(".booking-form").submit(function (e) {
                e.preventDefault();
                var search = $("#lication").val();
                location.replace("{{route('home')}}" + "?search=" + search);
            });
        });
    </script>


    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDXkzEIj9sB3J_ohqT0woVWqAJQiyRmAE&maptype=roadmap&libraries=places&callback=initMap"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $(".showMapByGeoLocation").click(function () {
                $('html, body').animate({
                    scrollTop: $("#LocationMap").offset().top
                }, 2000);
            });

            $('#priceModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var title = button.data('title');
                var modal = $(this);
                modal.find('.modal-title').text(title);

                $.ajax({
                    url: '/pricelist/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        var body = "<table width='100%' border='1' class='text-center'>" +
                            "<thead><tr>" +
                            "<th class='text-center'>Vehicle Type</th>" +
                            "<th class='text-center'>Time</th>" +
                            "<th class='text-center'>Peroid</th>" +
                            "<th class='text-center'>Price</th>" +
                            "</tr></thead><tbody>";

                        $.each(response, function (i, value) {
                            body += "<tr>" +
                                "<td>" + value.vehicletype.vehicle_type + "</td>" +
                                "<td>" + value.vehicle_time + "</td>" +
                                "<td>" + value.vehicle_period + "</td>" +
                                "<td>" + value.vehicle_charge + " ৳</td>" +
                                "</tr>";
                        });

                        if (response == '') {
                            body += "<tr><td colspan='4'>Price is not set yet!</td></tr>";
                            $(".book").attr("disabled", 'disabled');
                        }

                        body += "</tbody></table>";

                        modal.find('.modal-body').html(body);
                    },
                });
            });
        });

    </script>

    <script type="text/javascript">
        var map, marker, infowindow, lastMarker, request, title, directionsDisplay;
        var errorStatus = document.getElementById("error");
        var successStatus = document.getElementById("success");
        var config = {
            country: 'bd',
            zoom: parseInt("15"),
            lat: parseFloat(""),
            lng: parseFloat(""),
            title: ("ParkAnywhere"),
            location: <?php print_r(json_encode($parkingzone_data)) ?> ,


        };
        console.log(config.location);

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: config.zoom,
                center: {lat: config.lat, lng: config.lng},
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true,
                navigationControlOptions: {style: google.maps.NavigationControlStyle.ZOOM_PAN},
                mapTypeId: google.maps.MapTypeId.TRANSIT
            });

            for (var count in config.location) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(config.location[count].lat, config.location[count].lng),
                    map: map,
                    title: config.location[count].title
                });


                // add custom label
                var content = config.location[count].title;
                var infowindow = new google.maps.InfoWindow({
                    content: '<strong style="color:#3F51B5;font-weight:bolder">' + content + '</strong>'
                });
                infowindow.open(map, marker);

                //click to show/hide info window
                google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
                    return function () {
                        infowindow.setContent(content);
                        infowindow.open(map, marker);
                    };
                })(marker, content, infowindow));
            }


            //------------------------------------------------------------
            // HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function geolocationSuccess(position) {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    document.getElementById("start").value = position.coords.latitude + ', ' + position.coords.longitude;
                    //change direction
                    myDirection(position.coords.latitude + ', ' + position.coords.longitude);

                    //display address
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({latLng: pos}, function (results, status) {
                        if (google.maps.GeocoderStatus.OK) {
                            document.getElementById("pac-input").value = results[0].formatted_address;
                        }
                    });
                    console.log(geocoder);

                    //display location
                    makeNewMarker(pos, 'My Location');
                }, function () {
                    errorStatus.innerHTML = 'browser doesn\'t support geolocation';
                    errorStatus.classList.remove("sr-only");
                });
            }
            //------------------------------------------------------------
            /* autocomplete search*/
            var input = document.getElementById('pac-input');
            var options = {
                componentRestrictions: {country: config.country}
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            autocomplete.addListener('place_changed', function () {

                var place = autocomplete.getPlace();
                if (place.geometry) {
                    var position = place.geometry.location.lat() + ", " + place.geometry.location.lng();

                    document.getElementById("start").value = position;
                    //display location
                    makeNewMarker(place.geometry.location, 'My Location');
                    //change direction
                    onChangeDirectionHandler();

                } else {
                    errorStatus.innerHTML = "No details available for input: '" + place.name + "'";
                    errorStatus.classList.remove("sr-only");
                }
            });

            //------------------------------------------------------------
            /* get direction with select / click*/
            var onChangeDirectionHandler = function () {
                var start = document.getElementById('start').value;
                var end = document.getElementById('place_id').value;
                var title = document.getElementById('place_id');
                var title = title.options[title.selectedIndex].text;

                var loc = end.split(',');
                var end = loc[1] + "," + loc[2];

                // make new direction
                makeNewDirection(start, end);
            };
            // document.getElementById('place_id').addEventListener('change', onChangeDirectionHandler);


            var geoLoc = document.getElementsByClassName('showMapByGeoLocation');
            for (var i = 0; i < geoLoc.length; i++) {
                geoLoc[i].addEventListener('click', function () {
                    var start = document.getElementById('start').value;
                    var end = this.getAttribute("data-geolocation");
                    var title = this.getAttribute("data-title");

                    var loc = end.split(',');
                    var end = loc[1] + "," + loc[2];
                    // make new direction
                    makeNewDirection(start, end);
                });
            }


            //------------------------------------------------------------
            function makeNewDirection(start, end) {
                if (directionsDisplay) {
                    directionsDisplay.setMap(null);
                    //remove previous marker
                    lastMarker.setMap(null);
                }
                makeNewMarker(null, null);


                directionsDisplay = new google.maps.DirectionsRenderer({
                    polylineOptions: {
                        strokeColor: "#3F51B5"
                    }
                });
                directionsDisplay.setMap(map);

                var request = {
                    origin: start,
                    destination: end,
                    optimizeWaypoints: false,
                    travelMode: google.maps.TravelMode.DRIVING
                };
                var directionsService = new google.maps.DirectionsService();

                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {

                        var distance = (response.routes[0].legs[0].distance.value / 1000).toFixed(2);

                        var seconds = parseInt(response.routes[0].legs[0].duration.value, 10);
                        var days = Math.floor(seconds / (3600 * 24));
                        var hours = Math.floor(seconds / 3600);
                        var minutes = Math.floor((seconds - (hours * 3600)) / 60);
                        var time = (days ? days + ' days ' : '') + (hours ? hours + ' hours ' : '') + (minutes ? minutes + ' minutes ' : '');

                        // Display the distance and duration:
                        directionsDisplay.setDirections(response);

                        successStatus.innerHTML = "Approximate distance is " +
                            distance + " kilometers and Approximate time is " + time;
                        successStatus.classList.remove("sr-only");
                        errorStatus.classList.add("sr-only");
                    }
                });
            }


            //------------------------------------------------------------
            function makeNewMarker(position, title) {
                //remove previous marker
                if (lastMarker) {
                    lastMarker.setMap(null);
                }

                lastMarker = new google.maps.Marker({
                    position: position,
                    map: map,
                    zIndex: 99,
                    animation: google.maps.Animation.DROP,
                    strokeColor: "#3F51B5"
                });
                map.setCenter(position);

                // add custom label
                var infowindow = new google.maps.InfoWindow({
                    content: '<strong  style="color:#3F51B5;font-weight:bolder">' + title + '</strong>'
                });
                infowindow.open(map, lastMarker);
            }

            //------------------------------------------------------------
            function myDirection(origin) {
                makeNewMarker(null, null);

                directionsDisplay = new google.maps.DirectionsRenderer({
                    polylineOptions: {
                        strokeColor: "red"
                    }
                });
                directionsDisplay.setMap(map);

                var request = {
                    origin: origin,
                    destination: config.lat + ', ' + config.lng,
                    travelMode: google.maps.TravelMode.DRIVING
                };
                var directionsService = new google.maps.DirectionsService();

                directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {

                        var distance = (response.routes[0].legs[0].distance.value / 1000).toFixed(2);

                        var seconds = parseInt(response.routes[0].legs[0].duration.value, 10);
                        var days = Math.floor(seconds / (3600 * 24));
                        var hours = Math.floor(seconds / 3600);
                        var minutes = Math.floor((seconds - (hours * 3600)) / 60);
                        var time = (days ? days + ' days ' : '') + (hours ? hours + ' hours ' : '') + (minutes ? minutes + ' minutes ' : '');

                        // Display the distance and duration:
                        directionsDisplay.setDirections(response);

                        successStatus.innerHTML = "Approximate distance is " +
                            distance + " kilometers and Approximate time is " + time;
                        successStatus.classList.remove("sr-only");
                    }
                });
            }
        }
    </script>

@endsection

