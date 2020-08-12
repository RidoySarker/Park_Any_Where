<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Park Any where</title>
    <!--===============================================================================================-->
    <link rel="stylesheet"
          href="{{asset('backend_assets/reg/fonts/material-icon/css/material-design-iconic-font.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('backend_assets/reg/css/style.css')}}"/>
    <!--===============================================================================================-->
</head>
<body>
<div class="main">
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form">
                        @csrf
                        {{--
                                                    <div class="form-group">
                                                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                                        <img id='previmage' style="margin-left: 25px;width:50%;border-radius: 50%;border: dotted;" src="{{asset('images/blank_avatar.png')}}" alt="your image" class='img-responsive img-circle' />
                                                        <input type="file" class="form-control"  id="image" name="image" onchange="readURL(this);" />
                                                        <span class="help-block" id="name_error" style="color:red;"></span>

                                                    </div> --}}


                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name"
                                   autocomplete="name" autofocus/>
                            <span class="help-block" id="name_error" style="color:red;"></span>

                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                            <input type="text" class="form-control" name="number" id="number"
                                   placeholder="Enter your Phone Number" autocomplete="name" autofocus/>
                            <span class="help-block" id="number_error" style="color:red;"></span>

                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" id="email" class="form-control" name="email"
                                   placeholder="Enter your email" autocomplete="email"/>
                            <span class="help-block" id="email_error" style="color:red;"></span>

                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Enter your password" autocomplete="new-password"/>
                            <span class="help-block" id="password_error" style="color:red;"></span>
                            <span id="passwordMessage"></span>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" id="con_pass" name="password_confirmation"
                                   placeholder="Confirm your password" autocomplete="new-password"/>
                            <span id="pass"></span>

                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term"/>
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <button type="submit" class="form-submit submit">Register</button>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('backend_assets/reg/images/signup-image.jpg')}}" alt="sing up image">
                    </figure>
                    <a href="{{url('login')}}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- JS -->
<!--===============================================================================================-->
<script src="{{asset('backend_assets/reg/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('backend_assets/reg/js/main.js')}}"></script>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#previmage')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function myFunction() {
        window.print();
    }
</script>


<script type="text/javascript">

    $(document).ready(function () {
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

        $("#con_pass").keyup(function () {
            $(".submit").attr("disabled", true);
            var password = $("#password").val();
            var conpass = $(this).val();
            if (conpass != '' && password == conpass) {
                $("#pass").html("<span style='color:green;'><i class='fa fa-check-circle'></i> Password matched</span>");
                $(".submit").attr("disabled", false);
            } else {
                $("#pass").html("<span style='color:#ff0000;'><i class='fa fa-exclamation-triangle'></i> Confirm Password Not matched</span>");

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


    });


</script>
<!--===============================================================================================-->
</body>
</html>
