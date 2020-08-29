$(document).ready(function () {
    $(".submit").attr("disabled", 'disabled');
    $("#current_password").keyup(function () {
        var current_password = $(this).val();
        $.ajax({
            url:"/admin/pass",
            type:"get",
            data:{current_password: current_password},
            success: function(data)
            {
                if (data == "match") {
                    $(".icon").html("<i style='color:green;float: right;margin-top: -25px;' class ='fa fa-check-circle'></i>");
                    $(".submit").removeAttr("disabled", 'disabled');
                         $("#new_password").removeAttr("disabled", 'disabled');
                         $("#retype_password").removeAttr("disabled", 'disabled');
                         $("#new_password").keyup(function(){
                             $(".submit").attr("disabled", 'disabled');
                         })

                         $("#retype_password").keyup(function(){
                             $(".submit").attr("disabled", 'disabled');
                             var retype_password = $(this).val();
                             var new_password = $("#new_password").val();
                             if (retype_password == new_password ) {
                                $(".retype_icon").html("<i style='color:green;float: right;margin-top: -25px;' class ='fa fa-check-circle'></i>");
                                $(".submit").removeAttr("disabled", 'disabled');
                             } else {
                                $(".retype_icon").html("<i style='color:red;float: right;margin-top: -25px;' class ='fa fa-close'></i>");
                                $(".submit").attr("disabled", 'disabled');
                             }


                         })
                } else {
                    $(".icon").html("<i style='color:red;float: right;margin-top: -25px;' class ='fa fa-close'></i>");
                    $(".submit").attr("disabled", 'disabled');
                }
            }
        })
    })
});
