<body onload="PreLoaderFunction()">
    <!-- Preloader -->
    <div id="loading"></div>
    <!-- Preloader -->
    
{{-- Navbar Start --}}
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top menubar">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('frontend_assets/images/logo5.png') }}" alt="Logo" style="width:220px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto text-right">
                <li class="nav-item">
                    <a class="nav-link text-muted" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="/rent-user/login">Rent out your driveway</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Help</a>
                </li>

                @guest
                
                <li class="nav-item">
                    <a class="nav-link text-muted" href="{{url('login')}}">Login</a>
                </li>

                <li style="margin:7px;" class="nav-item">
                <a href="{{url('register')}}" class="btn-signup">SignUp</a>
                </li>
                @endguest

                @auth
{{--                 <li style="margin:7px;" class="nav-item">

                <form action="{{route('logout')}}" method="post" >
                    @csrf
                <button type="submit" class=" btn btn-info">Sign-out</button>
                </form>
                </li> --}}
                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="{{ Auth::user()->profile_image ==''? '/images/app_setting/blank_avatar.png' : '/'.Auth::user()->profile_image }}" style=" max-width: 36px; border-radius: 50%; " > </button>
                            <div class="dropdown-menu  dropdown-menu-right">
                                <div class="user-profile-area">
                                    <a href="{{url('/myprofile')}}" class="dropdown-item"><i class="bx bx-user font-15" aria-hidden="true"></i> My Profile</a>
                                    <a href="{{url('/booking-history')}}" class="dropdown-item"><i class="bx bx-user font-15" aria-hidden="true"></i> Booking History</a>
                                    @if(Auth::user()->user_type == 2)
                                    <a href="{{url('/rentuser-parkingzone')}}" class="dropdown-item"><i class="bx bx-user font-15" aria-hidden="true"></i> Add Parking Zone</a>
                                    @endif
{{--                                     <a href="#" class="dropdown-item"><i class="bx bx-wallet font-15" aria-hidden="true"></i> My wallet</a>
                                    <a href="#" class="dropdown-item"><i class="bx bx-wrench font-15" aria-hidden="true"></i> settings</a> --}}
                                    <form action="{{route('logout')}}" method="post" >
                                        @csrf
                                    <button class="dropdown-item" type="submit"><i class="bx bx-power-off font-15" aria-hidden="true"></i>Sign-out</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                @endauth
            </ul>
        </div>
    </nav>
    {{-- Navbar end --}}