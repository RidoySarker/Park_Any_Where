$(document).ready(function () {

    $(document).on("submit", "#ParkingZone", function (e) {
        e.preventDefault();
        var id = $("#id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html(message = "");
        })
        $.ajax({
            url: "/admin/parkingzone/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Parking Zone Update successfully", "Success!");

            }, error: function (error) {
                toastr.warning("Validation Required", "Warning!");
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_error").html(message[0]);
                })
            }
        });
    });

});

$(document).ready(function () {
    $('#autoGenerateSerial').click();
});


var parking_limit_data = document.getElementById('autoGenerateSerial');
parking_limit_data.addEventListener('click', function () {
    var serial = '';
    var serialText = '';
    var parking_limit = $("#parking_limit").val();
    if (parking_limit > 0) {
        for (var i = 1; i <= parking_limit; i++) {
            serial = serial + i + ',';
            serialText = serialText + "<span class=\"tag\">" + i + " <i class=\"fa fa-car\"></i></span> ";

        }
    } else {
        $(".tagsinput").html('');
        $(".space").val('');
    }
    $(".tagsinput").html(serialText);
    $(".space").val(serial);
});


var map, marker, infowindow;
var latitude = parseFloat($("#latitude").val());
var longitude = parseFloat($("#longitude").val());
var marTit = $("#parking_name").val();
var marLat = parseFloat($("#latitude").val());
var marLng = parseFloat($("#longitude").val());

function initMap() {
    // initial map setting
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        mapTypeId: 'roadmap',
    });
    map.setCenter({lat: latitude, lng: longitude});

    // find geoLocation
    if (!latitude || !longitude)
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function geolocationSuccess(position) {
                document.getElementById('latitude').value = position.coords.latitude;
                document.getElementById('longitude').value = position.coords.longitude;

                map.setCenter({
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                });
            }, function () {
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
        content: '<strong style="color:green;font-weight:bolder">' + (marTit ? marTit : "My Location") + '</strong>'
    });
    infowindow.open(map, marker);


    // add marker
    google.maps.event.addListener(map, 'click', function (event) {
        placeMarker(event.latLng);
        document.getElementById('latitude').value = event.latLng.lat();
        document.getElementById('longitude').value = event.latLng.lng();
    });
}


// add a marker
function placeMarker(location = null) {

    if (!location) {
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
    if (infowindow) {
        infowindow.close();
    }
    var parking_name = document.getElementById('parking_name').value;
    infowindow = new google.maps.InfoWindow({
        content: '<strong style="color:green;font-weight:bolder">' + (parking_name ? parking_name : "My Location") + '</strong>'
    });
    infowindow.open(map, marker);

    marker.setMap(map);
}

// chnage marker parking_name
document.getElementById("parking_name").addEventListener('keyup', function () {
    placeMarker({
        lat: parseFloat(document.getElementById('latitude').value),
        lng: parseFloat(document.getElementById('longitude').value),
    });
});

// chnage marker by latitude
document.getElementById("latitude").addEventListener('keyup', function () {
    placeMarker({
        lat: parseFloat(document.getElementById('latitude').value),
        lng: parseFloat(document.getElementById('longitude').value),
    });
});

// chnage marker by longitude
document.getElementById("longitude").addEventListener('keyup', function () {
    placeMarker({
        lat: parseFloat(document.getElementById('latitude').value),
        lng: parseFloat(document.getElementById('longitude').value),
    });
});
