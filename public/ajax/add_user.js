$(document).ready(function () {
    // Insert Method //
    $(document).on("submit", "#add_user", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
             $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/adduser/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("User added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#add_user").trigger("reset");
    
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
            url: "/admin/adduser" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#edit_name").val(response.name);
                $("#edit_gender").val(response.gender);
                $("#edit_email").val(response.email);
                $("#edit_number").val(response.number);
                $("#edit_status").val(response.status);
                $("#edit_user_id").val(response.id);
            },
        });
    });
    // Edit Method End//

    // Update Method //
    $(document).on("submit", "#user_update", function (e) {
        e.preventDefault();
        var id = $("#edit_user_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_edit_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/adduser/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                toastr.success("User Updated successfully", "Success!");
                $("#edit").modal("hide");
                loaddata();
            },
            error: function (error) {
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_edit_error").html(message[0]);
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
                    url: "/admin/adduser/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "User Deleted Successfully",
                            "Success!"
                        );
                        loaddata();
                    },
                });
            }
        });
    });
    // Delete Method End//

    // Show Status Method //
    $("#datalist").on("click", "#user_status", function () {
        var id = $(this).attr("data");
        $.ajax({
            url: "/admin/adduser/" + id,
            type: "get",
            dataType: "json",
            success: function (response) {
                loaddata();
                if (response.status == 0) {
                    toastr.success(
                        "User Status Change into Inactive",
                        "Success!"
                    );
                } else {
                    toastr.success(
                        "User Status Change into Active",
                        "Success!"
                    );
                }
            },
        });
    });
    // Show Status Method End//

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

function loaddata(pagelink = "/admin/adduser/create") {
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