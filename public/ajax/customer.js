    
        $('#password').keyup(function () {  
           $(".submit").attr("disabled", true);
            $('#passwordMessage').html(checkStrength($('#password').val()))  
        })  
        function checkStrength(password) {  
        var strength = 0  
        if (password.length < 6) {  
            $('#passwordMessage').removeClass()  
            $('#passwordMessage').addClass('Short')  
            return '<span style="color:red;"><i class="fa fa-exclamation-triangle"></i> Password Is Weak</span>'  
        }  

        if (strength < 2) {  
            $('#passwordMessage').removeClass()  
            $('#passwordMessage').addClass('Weak')  
            return '<span style="color:green;"><i class="fa fa-check-circle"></i> Password Is Strong</span>'  
        }
        } 
        $("#con_pass").keyup(function() {
            $(".submit").attr("disabled", true);
          var password = $("#password").val();
          var conpass  = $(this).val();
          if(conpass != '' && password == conpass) {
            $("#pass").html("<span style='color:green;'><i class='fa fa-check-circle'></i> Password matched</span>");
            $(".submit").attr("disabled", false);
          }
          else {
            $("#pass").html("<span style='color:red;'><i class='fa fa-exclamation-triangle'></i> Confirm Password Not matched</span>");
            
          }
        });




    $(document).on("submit", "#register-form", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        console.log(data);
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html(message = "");
        })
        $.ajax({
            url: "/customer_register",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                window.location.href = "/"
                $("#register-form").trigger("reset");

            }, error: function (error) {
                $.each(error.responseJSON.errors, function (i, message) {
                    $("#" + i + "_error").html(message[0]);
                })
            }
        });
    });



    $(document).on("submit", "#Login", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        console.log(data);
        $.each(data, function (i, message) {
            $("#" + message.name + "_error").html(message = "");
        })
        $.ajax({
            url: "/customer_login",
            data: data,
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);
                window.location.href = "/"

            }, error: function (error) {

            	if (error.responseJSON.errors) {
	                $.each(error.responseJSON.errors, function (i, message) {
	                    $("#" + i + "_error").html(message[0]);
	                })

            	} else {
            		$("#login_error").html("Credentials Doesn't Match Our Records");
            	}

            }
        });
    });