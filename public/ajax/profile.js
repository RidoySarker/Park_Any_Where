$(document).ready(function () {
    $("#current_password").keyup(function () {
        var current_password = $(this).val();
        $.ajax({
            url: "profile/pass",
            type: "get",
            data: {
                current_password: current_password,
            },
            success: function (data) {
                if (data == "matched") {
                    $("#icon").html(
                        "<i style='color:green' class ='fa fa-check-circle'></i>"
                    );
                    $("#submit").attr("disabled", "disabled");
                    $("#new_password").removeAttr("disabled", "disabled");
                    $("#retype_password").removeAttr("disabled", "disabled");

                    $("#retype_password").keyup(function () {
                        var retype_password = $(this).val();
                        var new_password = $("#new_password").val();

                        if (
                            retype_password != "" &&
                            retype_password == new_password
                        ) {
                            $("#re_icon").html(
                                "<i style='color:green' class ='fa fa-check-circle'></i>"
                            );
                            $("#submit").removeAttr("disabled", "disabled");
                        } else {
                            $("#re_icon").html(
                                "<i style='color:red' class ='fa fa-check-circle-o'></i>"
                            );
                            $("#submit").attr("disabled", "disabled");
                        }
                    });
                } else {
                    $("#icon").html(
                        "<i style='color:red' class ='fa fa-check-circle'></i>"
                    );
                    $("#submit").attr("disabled", "disabled");
                    $("#new_password").attr("disabled", "disabled");
                    $("#retype_password").attr("disabled", "disabled");
                }
                if (data == "matched") {
                    $("#icon").html(
                        "<i style='color:green' class ='fa fa-check-circle'></i>"
                    );
                    $("#submit").attr("disabled", "disabled");
                    $("#new_password").removeAttr("disabled", "disabled");
                    $("#retype_password").removeAttr("disabled", "disabled");

                    $("#retype_password").keyup(function () {
                        var retype_password = $(this).val();
                        var new_password = $("#new_password").val();

                        if (
                            retype_password != "" &&
                            retype_password == new_password
                        ) {
                            $("#re_icon").html(
                                "<i style='color:green' class ='fa fa-check-circle'></i>"
                            );
                            $("#submit").removeAttr("disabled", "disabled");
                        } else {
                            $("#re_icon").html(
                                "<i style='color:red' class ='fa fa-check-circle-o'></i>"
                            );
                            $("#submit").attr("disabled", "disabled");
                        }
                    });
                }
            },
        });
    });
    $("#addProfile").submit(function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var contact = $("#contact").val();
        var gender = $("input[name='gender']:checked").val();

        if (
            $("#retype_password").val() != "" &&
            $("#new_password").val() != "" &&
            $("#retype_password").val() == $("#new_password").val()
        ) {
            var new_password = $("#retype_password").val();
            $.ajax({
                url: "profile/store",
                type: "post",
                data: {
                    name: name,
                    contact: contact,
                    gender: gender,
                    password: new_password,
                },
                dataType: "json",
                success: function (data) {
                    if (data.msgType == "success") {
                        toastr["success"](data.message);
                    }
                },
            });
        } else {
            $.ajax({
                url: "profile/store",
                type: "post",
                data: {
                    name: name,
                    contact: contact,
                    gender: gender,
                },
                dataType: "json",
                success: function (data) {
                    if (data.msgType == "success") {
                        toastr["success"](data.message);
                    }
                },
            });
        }
    });
});
