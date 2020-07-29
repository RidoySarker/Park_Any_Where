$(document).ready(function () {

    $("#payment_method_add").on('submit', function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            type: "POST",
            // url: "{{route('payment_method.store)}}",
            url: "/admin/payment_method/store",
            data: data,
            dataType: "json",
            success: function (response) {
                toastr.success("Payment Method added successfully", "Success!");
                $("#addModal").modal("hide");
    
            },
            error: function (errors) {
                var error = JSON.parse(errors.responseText).errors;
                $("#payment_method_add")
                    .find(".form-group")
                    .each(function () {
                        var $that = $(this);
                        $(this).find(".help-block").remove();
                        var inputName = $(this)
                            .find("[name]")
                            .first()
                            .attr("name");
                        if (error[inputName]) {
                            $.each(error[inputName], function (i, message) {
                                $that.append(
                                    '<span class="help-block" style="color:red;">' +
                                    message +
                                    "</span>"
                                );
                            });
                        }
                    });
            },
        });
    })

    $("#datalist").on("click", ".edit", function () {
        var data = $(this).attr("data");

        $.ajax({
            url: "/admin/payment_method" + "/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (response) {
                console.log(response);
                $("#edit_payment_method_name").val(response.edit_payment_method_name);
                $("#edit_payment_method_description").val(response.edit_payment_method_description);
                $("#edit_payment_method_status").val(response.edit_payment_method_status);
                $("#edit_payment_method_id").val(response.edit_payment_method_id);
            },
        });
    });

    $(document).on("submit", "#payment_method_update", function (e) {
        e.preventDefault();
        var id = $(this).attr("#edit_payment_method_id");
        let data = $(this).serializeArray();
        $.ajax({
            url: "/admin/payment_method/"+id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                toastr.success("Payment Method updated successfully", "Success!");
                $("#edit").modal("hide");
            },
            error: function (errors) {
                var error = JSON.parse(errors.responseText).errors;
                $("#package_update")
                    .find(".form-group")
                    .each(function () {
                        var $that = $(this);
                        $(this).find(".help-block").remove();
                        var inputName = $(this)
                            .find("[name]")
                            .first()
                            .attr("name");
                        if (error[inputName]) {
                            $.each(error[inputName], function (i, message) {
                                $that.append(
                                    '<span class="help-block" style="color:red;">' +
                                        message +
                                        "</span>"
                                );
                            });
                        }
                    });
            },
        });
    });
    $("#datalist").on("click",".page-link",function(e){
        e.preventDefault();
        var pagelink = $(this).attr('href');
        console.log(pagelink)
        loaddata(pagelink);
    });
    
    $("#search").keyup(function () {
        loaddata();
    });
    
    loaddata();
    });
});

function loaddata(pagelink="/admin/payment_method/create"){
    var search = $("#search").val();
    console.log(search);

    $.ajax({
        url: pagelink,
        data:{search : search},
        type: "get",
        dataType: "html",
        success: function(data) {
            $("#datalist").html(data);
        }
    });
}