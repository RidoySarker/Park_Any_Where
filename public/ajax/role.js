$(document).ready(function () {
    $(document).on("submit", "#role_save", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/role/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Role added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#role_save").trigger("reset");
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
            url: "/admin/role" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#edit_role_name").val(response.name);
                $("#edit_role_id").val(response.id);
            },
        });
    });

    $(document).on("submit", "#role_update", function (e) {
        e.preventDefault();
        var id = $("#edit_role_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/role/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                toastr.success("Role Updated successfully", "Success!");
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
                    url: "/admin/role/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "Role Deleted Successfully",
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

function loaddata(pagelink = "/admin/role/create") {
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
