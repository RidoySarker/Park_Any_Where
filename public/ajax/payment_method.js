$(document).ready(function () {
    // Insert Method //
    $(document).on("submit", "#payment_method_add", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
             $("#" + message.name + "_error").html((message = ""));
        });
        $.ajax({
            url: "/admin/payment_method/",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                toastr.success("Payment Method added successfully", "Success!");
                $("#addModal").modal("hide");
                loaddata();
                $("#payment_method_add").trigger("reset");
    
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
            url: "/admin/payment_method" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                $("#edit_payment_method_name").val(response.payment_method_name);
                $("#edit_payment_method_description").val(response.payment_method_description);
                $("#edit_payment_method_status").val(response.payment_method_status);
                $("#edit_payment_method_id").val(response.payment_method_id);
            },
        });
    });
    // Edit Method End//

    // Update Method //
    $(document).on("submit", "#payment_method_update", function (e) {
        e.preventDefault();
        var id = $("#edit_payment_method_id").val();
        let data = $(this).serializeArray();
        $.each(data, function (i, message) {
            $("#" + message.name + "_edit").html((message = ""));
        });
        $.ajax({
            url: "/admin/payment_method/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                toastr.success("Payment Method Updated successfully", "Success!");
                $("#edit").modal("hide");
                $("#payment_method_update").trigger("reset");
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
                    url: "/admin/payment_method/" + data,
                    data: data,
                    type: "delete",
                    dataType: "json",
                    success: function (response) {
                        toastr.success(
                            "Payment Method Deleted Successfully",
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
    $("#datalist").on("click", "#payment_method_status", function () {
        var data = $(this).attr("data");
        $.ajax({
            url: "/admin/payment_method/" + data,
            type: "get",
            dataType: "json",
            success: function (response) {
                loaddata();
                if (response.payment_method_status == 0) {
                    toastr.success(
                        "Payment Method Status Change into Inactive",
                        "Success!"
                    );
                } else {
                    toastr.success(
                        "Payment Method Status Change into Active",
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

function loaddata(pagelink = "/admin/payment_method/create") {
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