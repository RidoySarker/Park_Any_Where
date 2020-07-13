<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('frontend_assets/images/apple-touch-icon.png')}}">
    {{-- <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('frontend_assets/booking_section/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/booking_section/vendor/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/booking_section/css/style.css')}}">
    <!--===============================================================================================-->
    <title>Park AnyWhere</title>
</head>
<body>
    {{-- Navbar Start --}}
<div class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <a class="navbar-brand" href="#">
            <img src="{{asset('frontend_assets/images/logo1.png')}}" alt="Logo" style="width:220px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto text-right">
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Rent out your driveway</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">SignUp</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
    {{-- Navbar end --}}

    {{-- Main Wrapper Start --}}
<div class="container-fluid">
    <div class="main">
        <div class="container">
            <form id="booking-form" class="booking-form" method="POST">
                <div class="form-group">
                    <div class="form-destination">
                        <label for="destination">Destination</label>
                        <input type="text" id="destination" name="destination" placeholder="EG. HAWAII" />
                    </div>
                    <div class="form-date-from form-icon">
                        <label for="date_from">From</label>
                        <input type="text" id="date_from" class="date_from" placeholder="Pick a date" />
                        <!-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> -->
                    </div>
                    <div class="form-date-to form-icon">
                        <label for="date_to">To</label>
                        <input type="text" id="date_to" class="date_to" placeholder="Pick a date" />
                        <!-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> -->
                    </div>
                    <div class="form-quantity">
                        <label for="quantity">Quantity</label>
                        <span class="modify-qty plus" onClick="Tang()"><i class="zmdi zmdi-chevron-up"></i></span>
                        <input type="number" name="quantity" id="quantity" value="0" min="0" class="nput-text qty text">
                        <span class="modify-qty minus" onClick="Giam()"><i class="zmdi zmdi-chevron-down"></i></span>
                    </div>
                    <div class="form-submit">
                        <input type="submit" id="submit" class="submit" value="Book now" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    <!--===============================================================================================-->
    <script src="{{asset('frontend_assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    <script src="{{asset('frontend_assets/booking_section/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend_assets/booking_section/js/main.js')}}"></script>
    <!--===============================================================================================-->
</body>
</html>
