$(document).ready(function () {
    $(document).on("submit", "#app_setting", function (e) {
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

});
