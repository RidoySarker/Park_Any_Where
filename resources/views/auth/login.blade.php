<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login | Park Any where</title>
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
                    <h2 class="form-title">login</h2>
                    <form method="POST" class="register-form" id="Login">
                        @csrf
                        <span class="help-block" id="login_error" style="color:red;"></span>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                            <input type="text" class="form-control" name="email" id="email"
                                   placeholder="Enter your Phone Number" autocomplete="name" autofocus/>
                            <span class="help-block" id="email_error" style="color:red;"></span>

                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="Enter your password" autocomplete="new-password"/>
                            <span class="help-block" id="password_error" style="color:red;"></span>

                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Login"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('backend_assets/reg/images/signup-image.jpg')}}" alt="sing up image">
                    </figure>
                    <a href="{{url('login')}}" class="signup-image-link">Create New Account</a>
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
