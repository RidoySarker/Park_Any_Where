            <header class="top-header-area d-flex align-items-center justify-content-between">
                <div class="left-side-content-area d-flex align-items-center">
                    <!-- Mobile Logo -->
                    <div class="mobile-logo mr-3 mr-sm-4">
                        <a href="{{url('/admin')}}"><img src="{{asset('backend_assets/img/core-img/small-logo.png')}}" alt="Mobile Logo"></a>
                    </div>

                    <!-- Triggers -->
                    <div class="ecaps-triggers mr-1 mr-sm-3">
                        <div class="menu-collasped" id="menuCollasped">
                            <i class='bx bx-menu'></i>
                        </div>
                        <div class="mobile-menu-open" id="mobileMenuOpen">
                            <i class='bx bx-menu'></i>
                        </div>
                    </div>

                    <!-- Left Side Nav -->
{{--                     <ul class="left-side-navbar d-flex align-items-center">
                        <li class="hide-phone app-search">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </li>
                    </ul> --}}
                </div>

                <div class="right-side-navbar d-flex align-items-center justify-content-end">
                    <!-- Mobile Trigger -->
                    <div class="right-side-trigger" id="rightSideTrigger">
                        <i class='bx bx-menu-alt-right'></i>
                    </div>

                    <!-- Top Bar Nav -->
                    <ul class="right-side-content d-flex align-items-center">


                        <!-- Full Screen Mode -->
                        <li class="full-screen-mode ml-1">
                            <a href="javascript:" id="fullScreenMode"><i class='bx bx-exit-fullscreen'></i></a>
                        </li>



{{--                         <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='bx bx-bell bx-tada'></i> <span class="active-status"></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- Top Notifications Area -->
                                <div class="top-notifications-area">
                                    <!-- Heading -->
                                    <div class="notifications-heading">
                                        <div class="heading-title">
                                            <h6>Notifications</h6>
                                        </div>
                                        <span>07 New</span>
                                    </div>

                                    <div class="notifications-box" id="notificationsBox">
                                        <a href="#" class="dropdown-item">
                                            <i class='bx bx-shopping-bag'></i>
                                            <div>
                                                <span>Your order is placed</span>
                                                <p class="mb-0 font-12">Consectetur adipisicing elit. Ipsa, porro!</p>
                                            </div>
                                        </a>

                                        <a href="#" class="dropdown-item">
                                            <img src="" alt="">
                                            <div>
                                                <span>Haslina Obeta</span>
                                                <p class="mb-0 font-12">Consectetur adipisicing elit. Ipsa, porro!</p>
                                            </div>
                                        </a>

                                        <a href="#" class="dropdown-item">
                                            <i class='bx bx-atom bg-success'></i>
                                            <div>
                                                <span>Your order is Dollar</span>
                                                <p class="mb-0 font-12">Consectetur adipisicing elit. Ipsa, porro!</p>
                                            </div>
                                        </a>

                                        <a href="#" class="dropdown-item">
                                            <img src="" alt="">
                                            <div>
                                                <span>Your order is placed</span>
                                                <p class="mb-0 font-12">Consectetur adipisicing elit. Ipsa, porro!</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li> --}}

                        <li class="nav-item dropdown">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ Auth::user()->profile_image ==''? '/images/app_setting/blank_avatar.png' : '/'.Auth::user()->profile_image }}" alt=""></button>
                            <div class="dropdown-menu profile dropdown-menu-right">
                                <div class="user-profile-area">
                                    <a href="{{route('profile.index')}}" class="dropdown-item"><i class="bx bx-user font-15" aria-hidden="true"></i> My profile</a>
{{--                                     <a href="#" class="dropdown-item"><i class="bx bx-wallet font-15" aria-hidden="true"></i> My wallet</a>
                                    <a href="#" class="dropdown-item"><i class="bx bx-wrench font-15" aria-hidden="true"></i> settings</a> --}}
                                    <form action="{{route('logout')}}" method="post" >
                                        @csrf
                                    <button class="dropdown-item" type="submit"><i class="bx bx-power-off font-15" aria-hidden="true"></i>Sign-out</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>