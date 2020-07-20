
$(document).ready(function () {

             $('#package_name').hide();
             $('#vehicle_type').hide();
             $('#vehicle_charge').hide();
             $('#vehicle_time').hide();
             $("#package_charge").hide();
             $('#package_time').hide();
             $('#package_period').hide();
             $('#vehicle_period').hide();
        $(document).on("change", "#parking_type", function () {
            var Parking = $(this).val();
            console.log(Parking);
            if (Parking == 1) {
                $("#package_name").show();
                $('#vehicle_type').hide();
                $('#vehicle_charge').hide();
                $('#vehicle_time').hide();
                $('#package_period').hide();
                $('#vehicle_period').hide();

            }
            if (Parking == 2) {
                $("#vehicle_type").show();
                $('#package_name').hide();
                $("#package_charge").hide();
                $('#package_time').hide();
                $('#package_period').hide();
                $('#vehicle_period').hide();
            }
        })

        $(document).on("change", "#vehicle_type", function () {

                $("#vehicle_time").show();
                $('#vehicle_charge').show();
                $('#vehicle_period').show();
            
        })

        $(document).on("change", "#package_name", function () {

                $("#package_charge").show();
                $('#package_time').show();
                $('#package_period').show();
            
        })

     
        $('#package_name').on('change',function(e) {
         
         var id = e.target.value;
         console.log(id);

         $.ajax({
               
               url:"/admin/parkingzone/package_data/"+id,
               type:"get",
               data: id,
               dataType: "json",
               success:function (response) {
                console.log(response);
                $("#data_package_charge").val(response.package_charge);
                $("#data_package_time").val(response.package_time);
                $("#data_package_period").val(response.package_period);
               }
           })
        });


        $('#vehicle_type').on('change',function(e) {
         
         var id = e.target.value;
         console.log(id);

         $.ajax({
               
               url:"/admin/parkingzone/vehicle_data/"+id,
               type:"get",
               data: id,
               dataType: "json",
               success:function (response) {
                console.log(response);
                $("#data_vehicle_charge").val(response.vehicle_charge);
                $("#data_vehicle_time").val(response.vehicle_time);
                $("#data_vehicle_period").val(response.vehicle_period);

               }
           })
        });

    });



    var checkbox = document.getElementById('autoGenerateSerial');
    checkbox.addEventListener( 'click', function() {
        var serial = '';
        var serialText = '';
        var parking_limit = document.getElementById("parking_limit").value;
        if(parking_limit > 0) {
            for(var i = 1; i <= parking_limit; i++)
            {
                serial = i+", "+serial;
                serialText = serialText+"<span class=\"tag label label-info\">"+i+"<span> <i class=\"fa fa-car\" aria-hidden=\"true\"></i></span></span> "; 
            }
        } else {
            $(".tagsinput").html('');
            $(".space").val('');
        } 
        $(".tagsinput").html(serialText);
        $(".space").val(serial);
    });






 
    var map, marker, infowindow;
    var latitude  = parseFloat("");
    var longitude = parseFloat("");

    function initMap() 
    {
        // initial map setting
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          mapTypeId: 'roadmap',
        });
        map.setCenter({lat: latitude, lng: longitude});

        // find geoLocation
        if (!latitude || !longitude)
        if (navigator.geolocation) 
        {
            navigator.geolocation.getCurrentPosition(function geolocationSuccess(position) { 
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;

                map.setCenter({
                    lat: position.coords.latitude, 
                    lng: position.coords.longitude
                });
            }, function() {
                document.getElementById('error').innerHTML = 'Browser doesn\'t support geolocation';
                toastr.error("Browser doesn't support geolocation" , "Error!"); 
                document.getElementById('error').classList.remove("sr-only");
                $(".submit").attr("disabled", 'disabled');
            });
        }    
        
        marker = new google.maps.Marker({
            position: {lat: latitude, lng: longitude},
            map: map,
            draggable: false
        });
        marker.setPosition({lat: latitude, lng: longitude});

        var parking_name = document.getElementById('parking_name').value;
        infowindow = new google.maps.InfoWindow({
            content: '<strong style="color:green;font-weight:bolder">'+(parking_name?parking_name:"Parking Zone Name")+'</strong>'
        }); 
        infowindow.open(map, marker);


        // add marker
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
        }); 
    } 


    // add a marker
    function placeMarker(location = null) {

        if (!location) 
        {
            location = {
                lat: parseFloat(document.getElementById('latitude').value),
                lng: parseFloat(document.getElementById('longitude').value),
            }
        } 

        if (marker) { 
            marker.setPosition(location);
        } else {
            marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: false
            });
        }

        // add custom label
        if (infowindow)
        {
            infowindow.close();
        } 
        var parking_name = document.getElementById('parking_name').value;
        infowindow = new google.maps.InfoWindow({
            content: '<strong style="color:green;font-weight:bolder">'+(parking_name?parking_name:"Parking Zone Name")+'</strong>'
        }); 
        infowindow.open(map, marker);

        marker.setMap(map);      
    } 

    // chnage marker parking_name
    document.getElementById("parking_name").addEventListener('keyup', function() {
        placeMarker({
            lat: parseFloat(document.getElementById('latitude').value),
            lng: parseFloat(document.getElementById('longitude').value),
        });
    });

    // chnage marker by latitude
    document.getElementById("latitude").addEventListener('keyup', function() {
        placeMarker({
            lat: parseFloat(document.getElementById('latitude').value),
            lng: parseFloat(document.getElementById('longitude').value),
        });
    });

    // chnage marker by longitude
    document.getElementById("longitude").addEventListener('keyup', function() {
        placeMarker({
            lat: parseFloat(document.getElementById('latitude').value),
            lng: parseFloat(document.getElementById('longitude').value),
        });
    });
