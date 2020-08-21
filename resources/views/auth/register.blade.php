<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Park Any where</title>
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{asset('backend_assets/reg/fonts/material-icon/css/material-design-iconic-font.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend_assets/reg/css/style.css')}}" />
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
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" autocomplete="name" autofocus />
                                <span class="help-block" id="name_error" style="color:red;"></span>

                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                <input type="text" class="form-control" name="number" id="number" placeholder="Enter your Phone Number" autocomplete="name" autofocus />
                                <span class="help-block" id="number_error" style="color:red;"></span>

                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="email" />
                                <span class="help-block" id="email_error" style="color:red;"></span>

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" autocomplete="new-password" />
                                <span class="help-block" id="password_error" style="color:red;"></span>
                                <span id="passwordMessage"></span>

                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" id="con_pass" name="password_confirmation" placeholder="Confirm your password" autocomplete="new-password" />
                                <span id="pass"></span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
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
    <script type="text/javascript" src="{{asset('ajax/customer.js')}}"></script>
    <!--===============================================================================================-->
</body>

</html>
