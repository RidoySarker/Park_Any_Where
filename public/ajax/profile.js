$(document).ready(function () {
    $("#addProfile").submit(function (e) {
        e.preventDefault();
        var name = $("#name").val();
        var user_first_name = $("#user_first_name").val();
        var user_last_name = $("#user_last_name").val();
        var number = $("#number").val();
        var user_gender = $("input[name='user_gender']:checked").val();

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
                    user_first_name: user_first_name,
                    user_last_name: user_last_name,
                    number: number,
                    user_gender: user_gender,
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
                    user_first_name: user_first_name,
                    user_last_name: user_last_name,
                    number: number,
                    user_gender: user_gender,
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
