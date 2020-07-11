
<!doctype html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Register | Park Any where </title>


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
                
                                <h4 class="font-22 mb-0 text-white">Free Register</h4>

                            </div>
                            <div class="card-body p-4">


                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm">Confirm Password</label>
                                         <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
                                    </div>

                                    <div class="form-group mb-0 mt-15">
                                        <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                                    </div>

                                    <div class="text-center mt-15"><span class="mr-2 font-13">Already have an account?</span><a class="font-13 font-weight-bold" href="{{url('login')}}">Sign in</a></div>
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