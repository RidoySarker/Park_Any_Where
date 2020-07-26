
$(document).ready(function () {
            
            var Parking = $("#parking_type").val();
            console.log(Parking);


            if (Parking == 1) {
                 $("#package_name").show();
                 $('#vehicle_type').hide();
                 $("#parking_charge").show();
                 $('#parking_time').show();
                 $('#parking_period').show();

            }

            if (Parking == 2) {
                 $("#package_name").hide();
                 $('#vehicle_type').show();
                 $("#parking_charge").show();
                 $('#parking_time').show();
                 $('#parking_period').show();

            }



        $(document).on("change", "#parking_type", function () {
            var Parking = $(this).val();

            if (Parking == 1) {
                 $("#package_name").show();
                 $('#vehicle_type').hide();
                 $("#parking_charge").hide();
                 $('#parking_time').hide();
                 $('#parking_period').hide();

            }
            if (Parking == 2) {
                 $("#vehicle_type").show();
                 $('#package_name').hide();
                 $("#parking_charge").show();
                 $('#parking_time').show();
                 $('#parking_period').show();
            }
        })

        $(document).on("change", "#vehicle_type", function () {

                 $("#parking_charge").show();
                 $('#parking_time').show();
                 $('#parking_period').show();
            
        })

        $(document).on("change", "#package_name", function () {

                 $("#parking_charge").show();
                 $('#parking_time').show();
                 $('#parking_period').show();
            
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
                $("#data_parking_charge").val(response.package_charge);
                $("#data_parking_time").val(response.package_time);
                $("#data_parking_period").val(response.package_period);
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
                $("#data_parking_charge").val(response.vehicle_charge);
                $("#data_parking_time").val(response.vehicle_time);
                $("#data_parking_period").val(response.vehicle_period);

               }
           })
        });



    $(document).on("submit", "#ParkingZone" , function (e) {
        e.preventDefault();
        var id = $("#id").val();
        let data = $(this).serializeArray();
        console.log(data);
           $.each(data,function(i,message){
            $("#" + message.name+"_error").html(message="");
           })
        $.ajax({
            url: "/admin/parkingzone/"+id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function(response) {
                console.log(response);
                toastr.success("Vehicle added successfully", "Success!");

            },error:function(error){
                toastr.warning("Validation Required", "Warning!");
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i+"_error").html(message[0]);
                })
            }
        });
    });

    });

    $(document).ready(function(){
      $('#autoGenerateSerial').click();
    });



    var parking_limit_data = document.getElementById('autoGenerateSerial');
    parking_limit_data.addEventListener( 'click', function() {
        var serial = '';
        var serialText = '';
        var parking_limit = $("#parking_limit").val();
        if(parking_limit > 0) {
            for(var i = 1; i <= parking_limit; i++)
            {
                serial = serial+i+',';
                serialText = serialText+"<span class=\"tag\">"+i+" <i class=\"fa fa-car\"></i></span> "; 
                console.log(serial);
                console.log(serialText);
            }
        } else {
            $(".tagsinput").html('');
            $(".space").val('');
        } 
        $(".tagsinput").html(serialText);
        $(".space").val(serial);
    });






 
    var map, marker, infowindow;
    var latitude  = parseFloat($("#latitude").val());
    var longitude = parseFloat($("#longitude").val());
    var marTit = $("#parking_name").val();
    var marLat = parseFloat($("#latitude").val());
    var marLng = parseFloat($("#longitude").val());

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
                document.getElementById('error').innerHTML = 'browser doesn\'t support geolocation'; 
                document.getElementById('error').classList.remove("sr-only"); 
            });
        }    
        
        marker = new google.maps.Marker({
            position: {lat: marLat, lng: marLng},
            map: map,
            draggable: false
        });
        marker.setPosition({lat: marLat, lng: marLng});
        infowindow = new google.maps.InfoWindow({
            content: '<strong style="color:green;font-weight:bolder">'+(marTit?marTit:"My Location")+'</strong>'
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
            content: '<strong style="color:green;font-weight:bolder">'+(parking_name?parking_name:"My Location")+'</strong>'
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