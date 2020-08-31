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


    const arrayColumn = (arr, n) => arr.map(x => x[n]);
    $("#datalist").on("click", ".edit", function () {
        let data = $(this).attr("data");

        $.ajax({
            url: "/admin/role-permission/" + data + "/edit",
            type: "get",
            dataType: "json",
            success: function (data) {
                let role = data.role_permissions[0];
                $("#role_name").html(`${role.name}`);
                $("#edit_id").val(`${role.id}`);

                $(".permission_input").remove();
                let role_permission = role.permissions;
                let role_permissions = [];
                role_permissions = arrayColumn(role_permission, 'id');
                $.each(data.permissions, function (k, v) {
                    let status = $.inArray(v.id, role_permissions) != -1 ? 'checked' : '';
                    $("#permission_box").append(`<tr class="permission_input">
                                                <td style="font-weight: bold;">
                                                    ${v.name}
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="permission_id[]"
                                                           value="${v.id}"  ${status}>
                                                </td>
                                            </tr>`);
                });
            }
        })
    })


    $(document).on("submit", "#rolepermission_update", function (e) {
        e.preventDefault();
        let id = $("#edit_id").val();
        console.log(id);
        let data = $(this).serializeArray();
        // $.each(data, function (i, message) {
        //     $("#" + message.name + "_edit").html((message = ""));
        // });
        $.ajax({
            url: "/admin/role-permission/" + id,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                toastr.success("Role Permission Updated successfully", "Success!");
                $("#edit").modal("hide");
                loaddata();
            },
            // error: function (error) {
            //     $.each(error.responseJSON.errors, function (i, message) {
            //         $("#" + i + "_edit").html(message[0]);
            //     });
            // },
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

function loaddata(pagelink = "/admin/role-permission/create") {
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
