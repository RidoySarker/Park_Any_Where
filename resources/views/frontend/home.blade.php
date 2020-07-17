<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{asset('frontend_assets/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('frontend_assets/images/apple-touch-icon.png')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/booking_section/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/booking_section/vendor/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/booking_section/css/style.css')}}">
    <!--===============================================================================================-->
    <title>Park AnyWhere</title>
</head>
<body>
    {{-- Navbar Start --}}
    <div class="container-fluid backimg">
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
                    <li style="margin:7px;" class="nav-item">
                        <a href="#" class="btn-signup">SignUp</a>
                    </li>
                </ul>
            </div>
        </nav>
        {{-- Navbar end --}}

        {{-- Main Wrapper Start  Hero Section--}}
        <div class="main">
            <div class="container">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#hourly">HOURLY/DAILY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link monthly" data-toggle="tab" href="#monthly">MONTHLY</a>
                    </li>
                </ul>
                <h1 class="findtextone">Find parking in seconds</h1>
                <h5 class="findtexttwo" style="text-align:justify; text-align:center;">Choose from millions of available spaces, or reserve your space in advance. <br> Join over 3.5 million drivers enjoying easy parking.</h5>

                <div class="tab-content">
                    <form id="hourly" role="tab-panel" class="container tab-pane active booking-form" method="POST">
                        <div class="form-group">
                            <div class="form-destination">
                                <label for="destination">PARKING AT</label>
                                <input type="text" id="destination" name="destination" placeholder="EG. Dhaka" />
                            </div>
                            <div class="form-date-from form-icon">
                                <label for="date_from">From Date</label>
                                <input type="text" id="date_from" class="date_from" placeholder="Pick a date" />
                            </div>
                            <div class="form-date-to form-icon">
                                <label for="date_to">To Date</label>
                                <input type="text" id="date_to" class="date_to" placeholder="Pick a date" />
                            </div>
                            <div class="form-submit">
                                <input type="submit" id="submit" class="submit" value="Show Parking" />
                            </div>
                        </div>
                    </form>
                    <form id="monthly" role="tab-panel" class="container tab-pane fade booking-form" method="POST">
                        <div class="form-group">
                            <div class="form-destination">
                                <label for="destination">PARKING AT</label>
                                <input type="text" id="destination" name="destination" placeholder="EG. Dhaka" />
                            </div>
                            <div class="form-date-from form-icon">
                                <label for="date_from">From Date</label>
                                <input type="text" id="date_from" class="date_from" placeholder="Pick a date" />
                                {{-- <span class="icon"><i class="zmdi zmdi-calendar-alt"></i></span> --}}
                            </div>
                            <div class="form-date-to form-icon">
                                <label for="date_to">To Date</label>
                                <input type="text" id="date_to" class="date_to" placeholder="Pick a date" />
                            </div>
                            <div class="form-submit">
                                <input type="submit" id="submit" class="submit" value="Show Parking" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Main Wrapper Start  Hero Section--}}

    {{-- info_section start --}}
    <div class="container-fluid">
        <h2 class="infoh2">Parking Made Easy</h2>
        <div class="row justify-content-center info_section">
            <div class="col-md-4">
                <img src="frontend_assets/images/find_parking.png" alt="">
                <h3>Wherever, whenever</h3>
                <p>
                    Choose from millions of spaces across <br>
                    the BD
                    <br>
                    Find your best option for every car <br> journey
                </p>
            </div>
            <div class="col-md-4">
                <img src="frontend_assets/images/reserve.png" alt="">
                <h3>Peace of mind</h3>
                <p>
                    View information on availability, price <br> and restrictions
                    <br>
                    Reserve in advance at over 45,000+ <br> locations
                </p>
            </div>
            <div class="col-md-4">
                <img src="frontend_assets/images/park_car.png" alt="">
                <h3>Seamless experience</h3>
                <p>
                    Pay for ParkAnyWhere spaces via the <br> app or website
                    <br>
                    Follow easy directions and access <br> instructions
                </p>
            </div>
        </div>
    </div>
    {{-- info_section stop --}}

    {{-- Download Section Start --}}
    <div class="download_section">
        <div class="information">
            <div class="overlay"></div>
            <img src="{{asset('frontend_assets/images/mobile.png')}}" class="mobile" alt="">
            <div id="circle">
            </div>
        </div>
        <div class="controls">
            <h2>Download the Bangladeshi First Parking App</h2>

            <p class="text-muted">Rated 5 stars with an average satisfaction rating of 96%, ParkAnyWhere is the First <br> Bangladeshi favourite parking service. But don’t just take our word for it – check out<br> Some of the latest customer reviews below for our London parking spaces.</p>

            <h5>Enter your Email Address below <br> To receive A Mail with a link to download the free ParkAnyWhere App.</h5>
            <div class="input-group mb-3 inputbar">
                <input type="text" class="form-control" placeholder="Enter Your Email">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Send</button>
                </div>
            </div>
            <div class="download">
                <h4>OR DOWNLOAD FROM:</h5>
                <a href=""><img src="{{asset('frontend_assets/images/appstore.png')}}" alt="App Store"></a>
                <a href=""><img src="{{asset('frontend_assets/images/googleplay.png')}}" alt="Google Play"></a>
            </div>
        </div>
    </div>
    {{-- Download Section stop --}}

    {{-- Parking_Lot Section Start --}}
    <div class="container-fluid">
        <div class="row parklotimg">
            <div class="col-md-6 parklot">
                <h2>Rent out your parking space</h2>
                <p>Make easy tax free money by renting out your parking <br> space. It‘s free to list and only takes a <br> few minutes to get up and running.</p>
                <button class="btn btn-success btn-lg">Learn how to earn today</button>
                <div class="parkoverlay">

                </div>
            </div>
        </div>
        {{-- Parking_Lot Section Stop --}}

        {{-- Testimonial Section Start  --}}
        <section class="testimonials">
            <h1>What users are saying</h1>
            <p class="text-center">Don’t just take our word for it – check out some of the latest <br> customer reviews for our Bangladeshi parking spaces</p>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img class="user" src="{{asset('frontend_assets/images/user3.jpg')}}" alt="User Image">
                        <blockquote class="blockquotetesti">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, minima pariatur porro quaerat earum eius ex reiciendis ratione laborum repellat enim quisquam aut quidem ullam incidunt harum mollitia fugit officiis!</blockquote>
                        <h3>JAHID Bhuiyan <span class="designation">CarPark on BoardStreet</span></h3>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img class="user" src="{{asset('frontend_assets/images/user1.jpg')}}" alt="User Image">
                        <blockquote class="blockquotetesti">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, minima pariatur porro quaerat earum eius ex reiciendis ratione laborum repellat enim quisquam aut quidem ullam incidunt harum mollitia fugit officiis!</blockquote>
                        <h3>Hridoy Sarkar <span class="designation">CEO At ParkManage</span></h3>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="profile">
                        <img class="user" src="{{asset('frontend_assets/images/user2.jpg')}}" alt="User Image">
                        <blockquote class="blockquotetesti">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, minima pariatur porro quaerat earum eius ex reiciendis ratione laborum repellat enim quisquam aut quidem ullam incidunt harum mollitia fugit officiis!</blockquote>
                        <h3>Nipen Mozumder <span class="designation">CEO At Driveway</span></h3>

                    </div>
                </div>
            </div>
    </div>
    </section>
    {{-- Testimonial Section Stop  --}}





    <!--===============================================================================================-->
    <script src="{{asset('frontend_assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend_assets/booking_section/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('frontend_assets/booking_section/js/main.js')}}"></script>
    <!--===============================================================================================-->
</body>
</html>
