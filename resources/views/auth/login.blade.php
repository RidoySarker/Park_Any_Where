<!DOCTYPE html>
<html lang="en">
<head>
    <title> login | Park Any where </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('backend_assets/login/images/icons/map-marker.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/vendor/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/fonts/iconic/css/material-design-iconic-font.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/vendor/animate/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/vendor/css-hamburgers/hamburgers.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/vendor/animsition/css/animsition.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/vendor/select2/select2.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/vendor/daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/css/util.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('backend_assets/login/css/main.css')}}" />
    <!--===============================================================================================-->
</head>
<body>
    <div class="container-login100" style="background-image: url('{{asset("backend_assets/login/images/bg-01.jpg")}}');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="login100-form-title p-b-37">
                    Sign In
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Email">
                    <input class="input100" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your Email" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate="Enter password">
                    <input class="input100" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    <span class="focus-input100"></span>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign In
                    </button>
                </div>

                <div class="text-center p-t-57 p-b-20">
                    <span class="txt1">
                        Or login with
                    </span>
                </div>

                <div class="flex-c p-b-80">
                    <a href="#" class="login100-social-item">
                        <i class="fa fa-facebook-f"></i>
                    </a>

                    <a href="#" class="login100-social-item">
                        <img src="{{asset('backend_assets/login/images/icons/icon-google.png')}}" alt="GOOGLE">
                    </a>
                </div>

                <div class="text-center">
                    <a href="{{url('register')}}" class="txt2 hov1">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{asset('backend_assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('backend_assets/login/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{asset('backend_assets/login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('backend_assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('backend_assets/login/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('backend_assets/login/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('backend_assets/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('backend_assets/login/vendor/countdowntime/countdowntime.js')}}"></script>
    <script src="{{asset('backend_assets/login/js/main.js')}}"></script>
    <!--===============================================================================================-->
</body>
</html>
