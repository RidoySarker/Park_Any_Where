        <div class="ecaps-sidemenu-area">
            <!-- Desktop Logo -->
            <div class="ecaps-logo">
                <a href="{{url('admin')}}"><img style="max-height: 42px;" class="desktop-logo" src="{{asset($appsettings->application_logo)}}" alt="Desktop Logo"> <img class="small-logo" src="{{asset('backend_assets/img/core-img/small-logo.png')}}" alt="Mobile Logo"></a>
            </div>
{{-- asset('backend_assets/img/core-img/logo2.png') --}}
            <!-- Side Nav -->
            <div class="ecaps-sidenav" id="ecapsSideNav">
                <!-- Side Menu Area -->
                <div class="side-menu-area">
                    <!-- Sidebar Menu -->
                    <nav>
                        <ul class="sidebar-menu" data-widget="tree">
                            <li class="{{ (request()->is('admin')) ? 'active' : '' }}"><a href="{{url('admin')}}"><i class='bx bx-home-heart'></i><span>Dashboard</span></a></li>
                            <li class="{{ (request()->is('admin/vehicle')) ? 'active' : '' }}"><a href="{{url('/admin/vehicle')}}"><i class='bx bx-car'></i><span>Vehicle</span></a></li>
{{--                             <li class="{{ (request()->is('admin/package')) ? 'active' : '' }}"><a href="{{url('/admin/package')}}"><i class='bx bx-car'></i><span>Packages</span></a></li> --}}
                            <li class="{{ (request()->is('admin/parkingzone')) ? 'active' : '' }} treeview">
                                <a href="javascript:void(0)"><i class='bx bx-briefcase-alt-2'></i> <span>Parking Zone</span> <i class="fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="{{ (request()->is('admin/parkingzone')) ? 'active' : '' }}"><a href="{{url('/admin/parkingzone')}}">Parking Zone List</a></li>
                                    <li class="{{ (request()->is('admin/parkingzone/create')) ? 'active' : '' }}"><a href="{{url('/admin/parkingzone/create')}}">Add Parking Zone</a></li>
                                </ul>
                            </li>
                            <li class="{{ (request()->is('admin/parkingprice')) ? 'active' : '' }}"><a href="{{url('/admin/parkingprice')}}"><i class='bx bx-car'></i><span>Parking Price</span></a></li>
                            <li class="{{ (request()->is('admin/locationzone')) ? 'active' : '' }}"><a href="{{url('/admin/locationzone')}}"><i class='bx bxs-location-plus'></i> Zone Location</a></li>

                            <li class="{{ (request()->is('admin/booking_list')) ? 'active' : '' }} treeview">
                                <a href="javascript:void(0)"><i class='bx bx-briefcase-alt-2'></i> <span>Booking</span> <i class="fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                    <li class="{{ (request()->is('admin/today-booking')) ? 'active' : '' }}"><a href="{{url('/admin/today-booking')}}">Today Booking</a></li>
                                    <li class="{{ (request()->is('admin/active-booking')) ? 'active' : '' }}"><a href="{{url('/admin/active-booking')}}">Active Booking</a></li>
                                    <li class="{{ (request()->is('admin/booking_list')) ? 'active' : '' }}"><a href="{{url('/admin/booking_list')}}">Booking List</a></li>
                                </ul>
                            </li>


                            <li class="treeview">
                                <a href="javascript:void(0)"><i class='bx bx-slider-alt'></i> <span>Settings</span> <i class="fa fa-angle-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('/admin/payment_method')}}"><i class='bx bxs-wallet'></i> Payment Method</a></li>

                                    <li><a href="{{url('/admin/appsettings')}}"><i class='bx bx-slider-alt'></i> App Settings</a></li>
                                </ul>
                            </li>
                        </ul>
                        </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
