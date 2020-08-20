$(document).ready(function () {
    
    $(document).on("submit", "#ParkingZone", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        console.log(data);
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html(message = "");
        })
        $.ajax({
            url: "/admin/parkingzone/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Parking Zone Added successfully", "Success!");
                $("#ParkingZone").trigger("reset");

            }, error: function (error) {
                toastr.warning("Validation Required", "Warning!");
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_error").html(message[0]);
                })
            }
        });
    });


    $(document).on("click", "#parking_status", function () {
        var data = $(this).attr("data");
        $.ajax({
            url: "/admin/parkingzone/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                if (response.parking_status == 0) {
                    toastr.success("Parking Status Change into Inactive", "Success!");
                    location.reload();
                } else {
                    toastr.success("Parking Status Change into Active", "Success!");
                }
                location.reload();
            }

        });
    });


    $(document).on("click", ".delete", function () {
        var data = $(this).attr("data");
        console.log(data);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/admin/parkingzone/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success("Parking Deleted Successfully", "Success!");
                        location.reload();


                    }
                });
            }
        });
    });


});


var checkbox = document.getElementById('autoGenerateSerial');
checkbox.addEventListener('click', function () {
    var serial = '';
    var serialText = '';
    var parking_limit = document.getElementById("parking_limit").value;
    if (parking_limit > 0) {
        for (var i = 1; i <= parking_limit; i++) {
            serial = serial + i + ',';
            serialText = serialText + "<span class=\"tag label label-info\">" + i + "<span> <i class=\"fa fa-car\" aria-hidden=\"true\"></i></span></span> ";
        }
    } else {
        $(".tagsinput").html('');
        $(".space").val('');
    }
    $(".tagsinput").html(serialText);
    $(".space").val(serial);
});


var map, marker, infowindow;
var latitude = parseFloat("");
var longitude = parseFloat("");

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
                document.getElementById('error').innerHTML = 'Browser doesn\'t support geolocation';
                toastr.error("Browser doesn't support geolocation", "Error!");
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
        content: '<strong style="color:green;font-weight:bolder">' + (parking_name ? parking_name : "Parking Zone Name") + '</strong>'
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
        content: '<strong style="color:green;font-weight:bolder">' + (parking_name ? parking_name : "Parking Zone Name") + '</strong>'
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
