$(document).ready(function () {
    $(document).on("submit", "#package_save", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/package/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Package added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#package_save").trigger("reset");
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
            url: "/admin/package" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#edit_package_name").val(response.package_name);
                $("#edit_vehicle_type").val(response.vehicle_type);
                $("#edit_package_time").val(response.package_time);
                $("#edit_package_period").val(response.package_period);
                $("#edit_package_charge").val(response.package_charge);
                $("#edit_package_note").val(response.package_note);
                $("#edit_package_status").val(response.package_status);
                $("#edit_package_id").val(response.package_id);
            },
        });
    });

    $(document).on("submit", "#package_update", function (e) {
        e.preventDefault();
        var id = $("#edit_package_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/package/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Package Updated successfully", "Success!");
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
                    url: "/admin/package/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "Package deleted successfully",
                            "Success!"
                        );
                        loaddata();
                    },
                });
            }
        });
    });
    $("#datalist").on("click", "#package_status", function () {
        var data = $(this).attr("data");
        $.ajax({
            url: "/admin/package/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                loaddata();
                if (response.package_status == 0) {
                    toastr.success(
                        "Package Status Change into Inactive",
                        "Success!"
                    );
                } else {
                    toastr.success(
                        "Package Status Change into Active",
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
function loaddata(pagelink = "/admin/package/create") {
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
