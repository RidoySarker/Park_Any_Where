
<!doctype html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> login | Park Any where </title>

    <link rel="icon" href="img/core-img/favicon.png">

    <link rel="stylesheet" href="backend_assets/style.css">

</head>

<body class="login-area">


    <div id="preloader"></div>

    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-sm-10 col-md-7 col-lg-5">
             
                    <div class="middle-box">
                        <div class="card">
                            <div class="log-header-arae bg-img d-flex align-items-center p-3 primary-color-overlay height-130" style="background-image: url(img/bg-img/7.jpg)">
                        
                                <h4 class="font-22 mb-0 text-white">Log in to your account.</h4>

                            </div>
                            <div class="card-body p-4">


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                                    <div class="form-group">
                                        <label class="float-left" for="emailaddress">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email" autofocus>
                                                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>


                                    <div class="form-group">
                                        <a href="forget-password.html" class="text-dark float-right"></a>
                                        <label class="float-left" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                                                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                                    <div class="form-group d-flex justify-content-between align-items-center mb-3">
                                        <div class="checkbox d-inline mb-0">
                                            <input type="checkbox" name="checkbox-1" id="checkbox-8">
                                            <label for="checkbox-8" class="cr mb-0">Remember me</label>
                                        </div>
                                        <span class="font-13 text-primary"><a href="forget-password.html">Forgot password?</a></span>
                                    </div>

                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                    <div class="row mt-20">
                                        <div class="col-6">
                                            <a href="#" class="btn btn-googleplus waves-effect waves-light mb-2 btn-block"><i class="fa fa-google mr-1"></i><span class="text-center">google</span></a>
                                        </div>
                                        <div class="col-6">
                                            <a href="#" class="btn btn-facebook waves-effect waves-light mb-2 btn-block"><i class="fa fa-facebook mr-1"></i><span class="text-center">facebook</span></a>
                                        </div>
                                    </div>

                                    <div class="text-center mt-15"><span class="mr-2 font-13">Don't have an account?</span><a class="font-13 font-weight-bold" href="{{url('register')}}">Sign up</a></div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="backend_assets/js/jquery.min.js"></script>
    <script src="backend_assets/js/popper.min.js"></script>
    <script src="backend_assets/js/bootstrap.min.js"></script>
    <script src="backend_assets/js/bundle.js"></script>


    <script src="backend_assets/js/default-assets/active.js"></script>

</body>

</html>