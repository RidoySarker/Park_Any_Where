$(document).ready(function () {
    $(document).on("submit", "#application_settings", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/appsettings/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Settings Changed successfully", "Success!");
                $("#application_settings").trigger("reset");
                $("#settingsModal").modal("hide");
                loaddata();
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
            url: "/admin/appsettings" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#edit_application_name").val(response.application_name);
                $("#edit_application_email").val(response.application_email);
                $("#edit_application_phone").val(response.application_phone);
                $("#edit_application_address").val(
                    response.application_address
                );
                $("#edit_appsettings_id").val(response.appsettings_id);
            },
        });
    });

    $(document).on("submit", "#application_settings_update", function (e) {
        e.preventDefault();
        var id = $("#edit_appsettings_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/appsettings/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Settings Updated successfully", "Success!");
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
                    url: "/admin/appsettings/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "Settings deleted successfully",
                            "Success!"
                        );
                        loaddata();
                    },
                });
            }
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
function loaddata(pagelink = "/admin/appsettings/create") {
    $.ajax({
        url: pagelink,
        type: "get",
        dataType: "html",
        success: function (data) {
            $("#datalist").html(data);
        },
    });
}
