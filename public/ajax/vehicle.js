$(document).ready(function () {
    $(document).on("submit", "#vehicle_save", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/vehicle/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Vehicle added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#vehicle_save").trigger("reset");
            },
            error: function (error) {
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_error").html(message[0]);
                });
            },
        });
    });

    $("#datalist").on("click", ".edit", function () {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/vehicle" + "/" + data + "/edit",
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

    $(document).on("submit", "#vehicle_update", function (e) {
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
                $("#vehicle_update").trigger("reset");
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
                    url: "/admin/vehicle/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "Vehicle Deleted Successfully",
                            "Success!"
                        );
                        loaddata();
                    },
                });
            }
        });
    });
    $("#datalist").on("click", "#vehicle_status", function () {
        var data = $(this).attr("data");
        $.ajax({
            url: "/admin/vehicle/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                loaddata();
                if (response.vehicle_status == 0) {
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

function loaddata(pagelink = "/admin/vehicle/create") {
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
