$(document).ready(function () {
    // Insert Method //
    $(document).on("submit", "#location_zone_add", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/locationzone/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Location Zone added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#location_zone_add").trigger("reset");

            },
            error: function (error) {
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_error").html(message[0]);
                });
            },
        });
    });
    // Insert Method end//

    // Edit Method //
    $("#datalist").on("click", ".edit", function () {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/locationzone" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#edit_location_zone_name").val(response.location_zone_name);
                $("#edit_location_zone_description").val(response.location_zone_description);
                $("#edit_location_zone_status").val(response.location_zone_status);
                $("#edit_location_zone_id").val(response.location_zone_id);
            },
        });
    });
    // Edit Method End//

    // Update Method //
    $(document).on("submit", "#location_zone_update", function (e) {
        e.preventDefault();
        var id = $("#edit_location_zone_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/locationzone/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                toastr.success("Location Zone Updated successfully", "Success!");
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
    // Update Method End//

    // Delete Method //
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
                    url: "/admin/locationzone/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "Location Zone Deleted Successfully",
                            "Success!"
                        );
                        loaddata();
                    },
                });
            }
        });
    });
    // Delete Method End//

    // loader needed //
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

function loaddata(pagelink = "/admin/locationzone/create") {
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
// loader needed //