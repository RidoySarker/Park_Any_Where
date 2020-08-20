@extends('frontend.layouts.frontend_main')
@section('title') Park AnyWhere @endsection
@section('css')
    
@endsection
@section('content')


    <br>
   <div class="main-content">
                <!-- Basic Form area Start -->
                <div class="container-fluid">

                    
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-xl-12 box-margin height-card">
                            <div class="card card-body">
                                <h4 class="card-title">New Booking</h4>
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form id="booking" action="{{url('/booking')}}" method="POST">
                                            @csrf
                                            <input name="booking_id" type="hidden" value="{{$vechicle_data->parking_name}}">
                                        <div class="row">
                                            
                                            <div class="col-xs-6 col-md-4">
                                                <label >Vehicle Type *</label>
                                                <div class="form-group">
                                                  
                                                <select class="form-control js-example-basic-single" id="vehicle_type" name="vehicle_type" >
                                                    <option selected disabled>Select</option>
                                                    @foreach($vechicle as $value)
                                                  <option value="{{$value->vehicle_type}}">{{$value->vehicletype->vehicle_type}}</option>
                                                    @endforeach
                                                </select>
                                                </div>
                                                 <br>
                                                 <div class="row">
                                                     
                                                    <div class="col-md-6">
                                                    <label >Vehicle Time *</label>
                                                    <div class="form-group">
                                                      
                                                        <input type="number" min="0" id="time" name="time" placeholder="Time" >
                                                    </div>

                                                    </div>

                                                   <div class="col-md-6">
                                                    <label >Vehicle Period *</label>
                                                    <div class="form-group">
                                                      
                                                    <select class="form-control js-example-basic-single" id="vehicle_period" name="vehicle_period">
                                                      <option >Select</option>
                                                    </select>
                                                    </div>
                                                        
                                                    </div>
                                                 </div>
                                                <br>
                                                <label >Arrival Time *</label>
                                                <div class="form-group">
                                                  
                                                  <input type="text" class="form-control datetimepicker" name="arrival_time" value="{{ date('Y-m-d H:i') }}">
                                                </div>





                                                <label >Select Space Time *</label>
                                                <div class="form-group">
                                                    
                                                         @foreach($parking_space as $parking_data)
                                                         <label class="radio-inline">
                                                      <input type="radio" name="parking_space" value="{{$parking_data->parking_space}}" >{{$parking_data->parking_space}} <span class="tag label label-info"><i class="fa fa-car"></i></span> 
                                                      </label>
                                                      @endforeach
                                                      </div>
                                                    
  










                              </div>
                                            <div class="col-xs-6 col-md-4">
                                                <label >Vehicle Licence  *</label>
                                                <div class="form-group">
                                                <select class="form-control js-example-basic-single" id="vehicle_licence" name="vehicle_licence" >
                                                    <option selected disabled>Select Licence</option>
                                                    
                                                        <option>112552BGHD22</option>
                                                        <option>112552BGHD22</option>
                                                        <option>112552BGHD22</option>
                                                        <option>112552BGHD22</option>
                                                        <option>112552BGHD22</option>
                                                </select>
                                                </div>

                                                <label >Discount </label>
                                                <div class="form-group">
                                                  
                                                  <input type="text" class="form-control" name="">
                                                  
                                                </div>


                                            </div>
                                            <div class="col-xs-6 col-md-4">
                                                 <label >Price </label>   
                                            <input type="text" class="" id="total" name="total" value="0" readonly>
                                            <hr>
                                            <label >Discount </label>   
                                            <input type="text" class="" id="discount" name="discount" value="0" readonly>
                                            <hr>
                                            <label >Total Price </label>   
                                            <input type="text" class="" id="total_price" name="total_price" value="0" readonly>
                                            <hr>

                                                <label >Payment Method  *</label>
                                                <div class="form-group">
                                                <select class="form-control js-example-basic-single" id="paymentMethod" name="paymentMethod" >
                                                    <option selected disabled>Select Payment Method</option>
                                                        @foreach ($paymentMethod as $value)
                                                            <option value="{{$value->payment_method_id}}">{{$value->payment_method_name}}</option>
                                                        @endforeach
                                                        
                                                </select>
                                                </div>
                                                <input type="text" class="" id="trxid" name="total_price" placeholder="trxid" >
                                                <hr>


                                             <button type="submit" class="btn btn-success">Book Now</button>
                                            </div>

                                        </div>
                                       
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>

       


                </div>











@endsection

@section('js')


<script type="text/javascript">

$(document).ready(function() {

    $('.js-example-basic-single').select2();
});
</script>



<script type="text/javascript">
    
$(document).ready(function(){
    $("#trxid").hide();

    $("body").on("click", ".datetimepicker", function(){
    $('.datetimepicker').datetimepicker({
        format:'Y-m-d H:i', 
        minDate:0,
        minDate: 0,
        step: 5,
    });
});
    

$(".showMapByGeoLocation").click(function() {
    $('html, body').animate({
        scrollTop: $("#map").offset().top
    }, 2000);
});


    $('#vehicle_type').on('change', function (e) {

        var id = e.target.value;

        
        $.ajax({

            url: "/vehicleperiod/" + id,
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                var options = "<option selected disabled >Select</option>";
                if (response != '')
                {
                    $.each(response, function(i, v){
                        options += "<option value='"+v.vehicle_charge+"'>"+ v.vehicle_period+"</option>";
                    });
                    $('#vehicle_period').html(options).parent().next().text('');
                }
            }
        })
    });


    $('#vehicle_period').on('change', function (e) {

        var id = e.target.value;
        var booking_id = $("input[name=booking_id]").val();


        $.ajax({

            url: "/vehicleprice/" + id + "/"+ booking_id,
            type: "get",
            dataType: "json",
            success: function (response) {
                totalPrice(response)
            }
        })
    });

    $('#time').on('keyup', function () {

        var id = $("#vehicle_period").val();
        var booking_id = $("input[name=booking_id]").val();
        console.log(id)

        $.ajax({

            url: "/vehicleprice/" + id + "/"+ booking_id,
            type: "get",
            dataType: "json",
            success: function (response) {
                totalPrice(response)
            }
        })
    });



    function totalPrice(response)
    {

            var time = $("input[name=time]").val();
            var total_price = parseInt(response.vehicle_charge);

            var total = total_price*parseInt(time);
            console.log(total);

            $("#total").val(total); 



        // $("#total_price").val(response.vehicle_charge); 

    }

$("#paymentMethod").on('change',function(){
    $("#trxid").show();
})


});

</script>

<script type="text/javascript">
        var map, marker, infowindow, lastMarker, request, title, directionsDisplay;
    var errorStatus   = document.getElementById("error");
    var successStatus = document.getElementById("success"); 
    var config = { 
        country: 'bd',
        zoom: parseInt("15"),
        lat: parseFloat(""),
        lng: parseFloat(""), 
        title: ("ParkAnywhere"),  
        location: ("ParkAnywhere"),  
                    

    }; 

    function initMap() 
    { 
        map = new google.maps.Map(document.getElementById('map'), {
            zoom  : config.zoom,
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
                content: '<strong style="color:#3F51B5;font-weight:bolder">'+content+'</strong>'
            }); 
            infowindow.open(map, marker); 

            //click to show/hide info window
            google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
                return function() {
                    infowindow.setContent(content);
                    infowindow.open(map,marker);
                };
            })(marker,content,infowindow));   
        }


        //------------------------------------------------------------
        // HTML5 geolocation. 
        if (navigator.geolocation) 
        {
            navigator.geolocation.getCurrentPosition(function geolocationSuccess(position) {
                pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude
                };  
                document.getElementById("start").value = position.coords.latitude+', '+position.coords.longitude;
                //change direction
                myDirection(position.coords.latitude+', '+position.coords.longitude);

                //display address
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({latLng: pos}, function(results, status) {
                    if (google.maps.GeocoderStatus.OK) {
                        document.getElementById("pac-input").value = results[0].formatted_address;
                    }  
                });
                console.log(geocoder);

                //display location
                makeNewMarker(pos, 'My Location'); 
            }, function() {
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
        autocomplete.addListener('place_changed', function() {

          var place = autocomplete.getPlace();
          if (place.geometry) 
          {
            var position = place.geometry.location.lat()+", "+place.geometry.location.lng();

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
        var onChangeDirectionHandler = function() {
            var start = document.getElementById('start').value;
            var end   = document.getElementById('place_id').value;
            var title = document.getElementById('place_id');
            var title = title.options[title.selectedIndex].text;
 
            var loc = end.split(','); 
            var end = loc[1]+","+loc[2]; 

            // make new direction 
            makeNewDirection(start, end);
        };
        // document.getElementById('place_id').addEventListener('change', onChangeDirectionHandler);


        var geoLoc = document.getElementsByClassName('showMapByGeoLocation');
        for (var i = 0; i < geoLoc.length; i++) {  
            geoLoc[i].addEventListener('click', function(){
                var start = document.getElementById('start').value;
                var end   = this.getAttribute("data-geolocation");
                var title = this.getAttribute("data-title");

                var loc = end.split(','); 
                var end = loc[1]+","+loc[2]; 
                // make new direction 
                makeNewDirection(start, end);
            });
        }



        //------------------------------------------------------------
        function makeNewDirection(start, end) {
            if(directionsDisplay)
            {
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
                origin      : start,
                destination : end,
                optimizeWaypoints: false,
                travelMode  : google.maps.TravelMode.DRIVING
            };
            var directionsService = new google.maps.DirectionsService(); 

            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {

                    var distance = (response.routes[0].legs[0].distance.value/1000).toFixed(2);
  
                    var seconds = parseInt(response.routes[0].legs[0].duration.value, 10);
                    var days     = Math.floor(seconds / (3600*24));
                    var hours    = Math.floor(seconds / 3600);
                    var minutes  = Math.floor((seconds - (hours * 3600)) / 60);
                    var time     = (days?days+' days ':'')+(hours?hours+' hours ':'')+(minutes?minutes+' minutes ':'');
                  
                    // Display the distance and duration:
                    directionsDisplay.setDirections(response); 

                    successStatus.innerHTML = "Approximate distance is "+
                    distance + " kilometers and Approximate time is "+ time;
                    successStatus.classList.remove("sr-only"); 
                    errorStatus.classList.add("sr-only"); 
                }
            });
        }


        //------------------------------------------------------------
        function makeNewMarker(position, title)
        { 
            //remove previous marker
            if (lastMarker)
            { 
                lastMarker.setMap(null); 
            }  

            lastMarker = new google.maps.Marker({
                position: position,
                map: map,
                zIndex: 99, 
                animation:google.maps.Animation.DROP,
                strokeColor: "#3F51B5"
            }); 
            map.setCenter(position); 

            // add custom label
            var infowindow = new google.maps.InfoWindow({
                content: '<strong  style="color:#3F51B5;font-weight:bolder">'+title+'</strong>'
            }); 
            infowindow.open(map, lastMarker); 
        }

                //------------------------------------------------------------
        function myDirection(origin)
        {  
            makeNewMarker(null, null); 

            directionsDisplay = new google.maps.DirectionsRenderer({
                polylineOptions: {
                  strokeColor: "red"
                }
            });
            directionsDisplay.setMap(map);

            var request = {
                origin      : origin,
                destination : config.lat+', '+config.lng,
                travelMode  : google.maps.TravelMode.DRIVING
            };
            var directionsService = new google.maps.DirectionsService(); 

            directionsService.route(request, function(response, status) {
                if (status == google.maps.DirectionsStatus.OK) {

                    var distance = (response.routes[0].legs[0].distance.value/1000).toFixed(2);
  
                    var seconds = parseInt(response.routes[0].legs[0].duration.value, 10);
                    var days     = Math.floor(seconds / (3600*24));
                    var hours    = Math.floor(seconds / 3600);
                    var minutes  = Math.floor((seconds - (hours * 3600)) / 60);
                    var time     = (days?days+' days ':'')+(hours?hours+' hours ':'')+(minutes?minutes+' minutes ':'');

                    // Display the distance and duration:
                    directionsDisplay.setDirections(response); 

                    successStatus.innerHTML = "Approximate distance is "+
                    distance + " kilometers and Approximate time is "+ time;
                    successStatus.classList.remove("sr-only"); 
                }
            });            
        }
    } 
</script>

@endsection

