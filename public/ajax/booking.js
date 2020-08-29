$(document).ready(function () {


    $('#time').on('keyup', function () {
        var time = $(this).val();
        CalculateData()

    });


    $('.vehicle_period').on('change', function () {

        CalculateData();


    });

    function CalculateData() {

        var parking_name = $("input[name=parking_name]");
        var vehicle_period = $("select[name=vehicle_period]");
        var arrival_time = $("input[name=arrival_time]");
        var vehicle_type = $("select[name=vehicle_type]");
        var time = $("input[name=vehicle_time]");
        var release_time = $("input[name=release_time]");
        var price       = $("input[name=invoice_total]");
        var vat             = $("input[name=invoice_vat]");
        $("#release_time").val("");

        if (parking_name.val() && time.val() && vehicle_period.val() && vehicle_type.val() && arrival_time.val()) {
            $.ajax({
                url: '/bookingvehicle',
                type: 'post',
                dataType: 'json',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    'parking_name': parking_name.val(),
                    'time': time.val(),
                    'vehicle_period': vehicle_period.val(),
                    'arrival_time': arrival_time.val(),
                    'vehicle_type': vehicle_type.val(),
                },
                success: function (response) {

                    release_time.val(response.release_time);
                    price.val(response.price);
                    vat.val(response.vat);
                    console.log(response.parking_space);
                    
                    if (response.parking_space) {
                        $("#space").html("");
                        $.each(response.parking_space, function (i, v) {
                            $('#space').append(" <label class='radio-inline'> <input type='radio' id='parking_space' name='parking_space'  value="+v.parking_space_id+" >" + v.parking_space + "  <span class='tag label label-info'><i class='fa fa-car'></i></span> </label><br>");
                                console.log(v.parking_space_id);

                        });

                    }
                    TotalPrice()


                }
            });
        }
    }


    function TotalPrice () {

        var price = $("input[name=invoice_total]").val();
        var vat       = $("input[name=invoice_vat]").val(); 
        var total_price = parseFloat(price)+parseFloat(vat);
        $("input[name=invoice_sub_total]").val(parseInt(total_price));
    }


    $("#trxid").hide();
    $("body").on("click", ".datetimepicker", function () {
        $('.datetimepicker').datetimepicker({
            format: 'Y-m-d H:i',
            minDate: 0,
            minDate: 0,
            step: 5,
        });
    });

    $(".showMapByGeoLocation").click(function () {
        $('html, body').animate({
            scrollTop: $("#map").offset().top
        }, 2000);
    });
    $('#vehicle_type').on('change', function (e) {
        var id = e.target.value;
        var parking_name = $("#parking_name").val();
        console.log(parking_name);

        $.ajax({
            url: "/vehicleperiod/" + id + "/" + parking_name,
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#price").val("");
                $("#vat").val("");
                $("#total_price").val("");
                var options = "<option selected disabled >Select</option>";
                if (response != '') {
                    $.each(response, function (i, v) {
                        options += "<option value='" + v.price_vechile_info_id + ',' + v.vehicle_period + "'>" + v.vehicle_period + "</option>";
                    });
                    $('#vehicle_period').html(options).parent().next().text('');
                }
            }
        })
    });
    $("#paymentMethod").on('change', function () {
        $("#trxid").show();
    })
});

















    $(document).on("submit", "#booking", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        console.log(data);

        var parking_name = $("input[name=parking_name]");
        var vehicle_period = $("select[name=vehicle_period]");
        var arrival_time = $("input[name=arrival_time]");

        var time = $("input[name=vehicle_time]");
        var release_time = $("input[name=release_time]");
        var price       = $("input[name=invoice_total]");
        var vat             = $("input[name=invoice_vat]");



        let vehicle_type = $("#vehicle_type").val();
        let times = $("#time").val();
        let vehicle_licence = $("#vehicle_licence").val();
        let vehicle_periods = $("#vehicle_period").val();
        let parking_space = $("input[name=parking_space]").val('');
        console.log(parking_space);


            if (vehicle_type === null) {
                toastr.warning("Select Vehicle Type", "Warning!");
                return;
            }



            if (times === '') {
                toastr.warning("Time Required", "Warning!");
                return;
            }


            if (vehicle_periods === null) {
                toastr.warning("Select Vehicle Peroid", "Warning!");
                return;
            }



        let vehicle_p = $("#vehicle_period").val().split(",");


        if(vehicle_p[1]==="minute")
        {
            if (times < 30) {
                toastr.warning("Minimum 30 minute", "Warning!");
                return;
            }
            // if (times > 60) {
            //     toastr.warning("Max 60 minute select other period", "Warning!");
            //     return;
            // }
        }

         if (parking_space === null) {
            toastr.warning("Select parking space", "Warning!");
            return;
        }



        if (vehicle_licence === null) {
            toastr.warning("Select vehicle licence", "Warning!");
            return;
        }







        
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html(message = "");
        })
        $.ajax({
            url: "/booking/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                
                // $("#booking").trigger("reset");
                window.location.href = "/confiramation/"+ response.data.invoice_code

            }, error: function (error) {
                
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_error").html(message[0]);
                })
            }
        });
    });


























               var map, marker, infowindow, lastMarker, request, title, directionsDisplay;
                var errorStatus = document.getElementById("error");
                var successStatus = document.getElementById("success");
                var config = {
                    country: 'bd',
                    zoom: parseInt("15"),
                    lat: parseFloat(""),
                    lng: parseFloat(""),
                    title: ("ParkAnywhere"),
                    location: ("ParkAnywhere"),

                };

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