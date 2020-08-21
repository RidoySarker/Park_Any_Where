$(document).ready(function(){
    $("body").on('click', '.addItem', function(){
        var data = $(".VehicleInfo").html();
        $(this).parent().parent().parent().append("<div class='row'>"+data+'</div>');
    });
    $("body").on('click', '.removeItem', function(){
        $(this).parent().parent().empty();
    });
});


    $('#vehicle_type').on('change', function (e) {

        var id = e.target.value;

        $.ajax({

            url: "/admin/parkingzone/vehicle_data/" + id,
            type: "get",
            data: id,
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#data_vehicle_time").val(response.vehicle_time);
                $("#data_vehicle_period").val(response.vehicle_period);
                $("#data_vehicle_charge").val(response.vehicle_charge);

            }
        })
    });



$(document).ready(function () {
    $(document).on("submit", "#parking_price_store", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/parkingprice/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Parking Price added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#parking_price_store").trigger("reset");
            },
            error: function (error) {
                toastr.error("Validation Required", "Error!");
            },
        });
    });

    $("#datalist").on("click", ".edit", function () {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/parkingprice" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#edit_vehicle_type").val(response.vehicle_type);
                $("#edit_vehicle_charge").val(response.vehicle_charge);
                $("#edit_vehicle_time").val(response.vehicle_time);
                $("#edit_vehicle_period").val(response.vehicle_period);
                $("#edit_vehicle_status").val(response.vehicle_status);
                $("#edit_vehicle_id").val(response.vehicle_id);
            },
        });
    });

    $(document).on("submit", "#parking_price_update", function (e) {
        e.preventDefault();
        var id = $("#edit_vehicle_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/vehicle/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                toastr.success("Vehicle Updated successfully", "Success!");
                $("#edit").modal("hide");
                loaddata();
            },
            error: function (error) {
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_edit").html(message[0]);
                });
            },
        });
    });

    $("#datalist").on("click", ".delete", function () {
        var data = $(this).attr("data");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "/admin/parkingprice/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "Parking Price Deleted Successfully",
                            "Success!"
                        );
                        loaddata();
                    },
                });
            }
        });
    });
    $("#datalist").on("click", "#price_status", function () {
        var data = $(this).attr("data");
        $.ajax({
            url: "/admin/parkingprice/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                loaddata();
                if (response.price_status == 0) {
                    toastr.success(
                        "Vehicle Status Change into Inactive",
                        "Success!"
                    );
                } else {
                    toastr.success(
                        "Vehicle Status Change into Active",
                        "Success!"
                    );
                }
            },
        });
    });

    $("#datalist").on("click", ".page-link", function (e) {
        e.preventDefault();
        var pagelink = $(this).attr("href");
        console.log(pagelink);
        loaddata(pagelink);
    });

    $("#search").keyup(function () {
        loaddata();
    });

    loaddata();
});

function loaddata(pagelink = "/admin/parkingprice/create") {
    var search = $("#search").val();
    console.log(search);

    $.ajax({
        url: pagelink,
        data: { search: search },
        type: "get",
        dataType: "html",
        success: function (data) {
            $("#datalist").html(data);
        },
    });
}
