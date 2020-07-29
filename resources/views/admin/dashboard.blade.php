@extends('admin.layouts.backend_main')
@section('title') Park Any where @endsection 
@section('main_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Welcome to Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Single Widget -->
        <div class="col-md-6 col-lg-3">
            <div class="single-widger-cart mb-30">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right"><i class='bx bxs-user-rectangle single-widget-icon'></i></div>
                        <h5 class="font-14 mt-0">Customers</h5>
                        <h3 class="mt-3 mb-3 font-20">46,356</h3>
                        <p class="mb-0"><span class="text-success mr-2"><i class='bx bx-trending-up font-16'></i> 6.28%</span><span>Since last month</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Widget -->
        <div class="col-md-6 col-lg-3">
            <div class="single-widger-cart mb-30">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right"><i class='bx bx-cart single-widget-icon'></i></div>
                        <h5 class="font-14 mt-0">Orders</h5>
                        <h3 class="mt-3 mb-3 font-20">2,456</h3>
                        <p class="mb-0"><span class="text-danger mr-2"><i class='bx bx-trending-down font-16'></i> 1.28%</span><span>Since last month</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Widget -->
        <div class="col-md-6 col-lg-3">
            <div class="single-widger-cart mb-30">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right"><i class='bx bx-dollar single-widget-icon'></i></div>
                        <h5 class="font-14 mt-0">Revenue</h5>
                        <h3 class="mt-3 mb-3 font-20">$45, 723</h3>
                        <p class="mb-0"><span class="text-success mr-2"><i class='bx bx-trending-up font-16'></i> 9.28%</span><span>Since last month</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Widget -->
        <div class="col-md-6 col-lg-3">
            <div class="single-widger-cart mb-30">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right"><i class='bx bx-bar-chart-alt single-widget-icon'></i></div>
                        <h5 class="font-14 mt-0">Average Price</h5>
                        <h3 class="mt-3 mb-3 font-20">$18.00</h3>
                        <p class="mb-0"><span class="text-success mr-2"><i class='bx bx-trending-up font-16'></i> 9.28%</span><span>Since last month</span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Area -->
        <div class="col-lg-8">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="card-header border-none bg-transparent d-flex align-items-center justify-content-between p-0 mb-30">
                        <div class="widgets-card-title">
                            <h5 class="card-title mb-0">Revenue</h5>
                        </div>
                        <div class="dashboard-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dashboardDropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown2">
                                    <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div id="apex-stacked-bar-chart"></div>
                </div>
            </div>
        </div>

        <!-- Sales by Category -->
        <div class="col-lg-4">
            <div class="card mb-30">
                <div class="card-body">
                    <div class="card-header border-none bg-transparent d-flex align-items-center justify-content-between p-0 mb-30">
                        <div class="widgets-card-title">
                            <h5 class="card-title mb-0">Sales By Category</h5>
                        </div>
                        <div class="dashboard-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dashboardDropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown1">
                                    <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Area -->
                    <div id="apexdonutchart"></div>

                    <!-- Product Info -->
                    <div class="row mt-20">
                        <div class="col-6 mb-15 text-center">
                            <h6 class="mb-0 font-14"><i class='bx bxs-bowling-ball text-primary font-12'></i> Phone : 56K</h6>
                        </div>
                        <div class="col-6 mb-15 text-center">
                            <h6 class="mb-0 font-14"><i class='bx bxs-bowling-ball text-blue-cu font-12'></i> Cloths : 48K</h6>
                        </div>
                        <div class="col-6 mb-15 text-center">
                            <h6 class="mb-0 font-14"><i class='bx bxs-bowling-ball text-success font-12'></i> Electro : 42K</h6>
                        </div>
                        <div class="col-6 mb-15 text-center">
                            <h6 class="mb-0 font-14"><i class='bx bxs-bowling-ball text-warning font-12'></i> Others : 33K</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Invoice -->
        <div class="col-lg-4">
            <div class="card mb-30">
                <div class="card-body pb-0">
                    <div class="card-header border-none bg-transparent d-flex align-items-center justify-content-between p-0 mb-30">
                        <div class="widgets-card-title">
                            <h5 class="card-title mb-0">Monthly Invoices</h5>
                        </div>
                        <div class="dashboard-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dashboardDropdown5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown5">
                                    <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="suggestions-lists">
                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bx-check bg-primary text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Jadrsha ios</h6>
                                    <p class="mb-0 font-13"><span class="text-success">19 paid</span> out of 25</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">$</span>23,563</h6>
                                <p class="mb-0 font-13">Per month</p>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bx-check bg-success text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Lobanda Ltd.</h6>
                                    <p class="mb-0 font-13"><span class="text-success">23 paid</span> out of 29</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">$</span>15,563</h6>
                                <p class="mb-0 font-13">Per month</p>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bx-check bg-warning text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Hiskla ios</h6>
                                    <p class="mb-0 font-13"><span class="text-success">17 paid</span> out of 23</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">$</span>14,563</h6>
                                <p class="mb-0 font-13">Per month</p>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bx-check bg-danger text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Jadrsha ios</h6>
                                    <p class="mb-0 font-13"><span class="text-success">19 paid</span> out of 25</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">$</span>23,563</h6>
                                <p class="mb-0 font-13">Per month</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Authors Profit -->
        <div class="col-lg-4">
            <div class="card mb-30">
                <div class="card-body pb-0">
                    <div class="card-header border-none bg-transparent d-flex align-items-center justify-content-between p-0 mb-30">
                        <div class="widgets-card-title">
                            <h5 class="card-title mb-0">Authors Profit</h5>
                        </div>
                        <div class="dashboard-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dashboardDropdown3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown3">
                                    <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Suggestion List -->
                    <ul class="suggestions-lists">
                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><img class="chat-img-2 mr-3" src="img/shop-img/17.jpg" alt=""></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Metriza Theme</h6>
                                    <p class="mb-0 font-13">Theme Development</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-0 font-15"><span class="text-secondary">$</span>15895</h6>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><img class="chat-img-2 mr-3" src="img/shop-img/18.jpg" alt=""></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Motrila Ltd.</h6>
                                    <p class="mb-0 font-13">Good Coffee &amp; Snacks </p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-0 font-15"><span class="text-secondary">$</span>2546</h6>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><img class="chat-img-2 mr-3" src="img/shop-img/19.jpg" alt=""></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Apoze Theme</h6>
                                    <p class="mb-0 font-13">Make Development</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-0 font-15"><span class="text-secondary">$</span>14589</h6>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><img class="chat-img-2 mr-3" src="img/shop-img/20.jpg" alt=""></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Flt Themes</h6>
                                    <p class="mb-0 font-13">Theme Development</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-0 font-15"><span class="text-secondary">$</span>56982</h6>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-30">
                <div class="card-body pb-0">
                    <div class="card-header border-none bg-transparent d-flex align-items-center justify-content-between p-0 mb-30">
                        <div class="widgets-card-title">
                            <h5 class="card-title mb-0">Payment History</h5>
                        </div>
                        <div class="dashboard-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dashboardDropdown4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown4">
                                    <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Suggestion List -->
                    <ul class="suggestions-lists">
                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bxl-paypal bg-primary text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Deposit PayPal</h6>
                                    <p class="mb-0 font-13">5 Jun, 16:33</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">+</span> 1523</h6>
                                <p class="mb-0 text-success text-right font-13">USD</p>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bx-check bg-danger text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Deposit from MTL</h6>
                                    <p class="mb-0 font-13">6 Jun, 17:33</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">-</span> 1523</h6>
                                <p class="mb-0 text-success text-right font-13">USD</p>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bx-x bg-warning text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Cancelled</h6>
                                    <p class="mb-0 font-13">5 Jun, 14:33</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">+</span> 0</h6>
                                <p class="mb-0 text-success text-right font-13">USD</p>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-30 align-items-center">
                            <div class="d-flex align-items-center">
                                <div><i class='bx bx-chalkboard bg-primary text-white profile-icon'></i></div>
                                <div class="media-support-info">
                                    <h6 class="mb-1 font-15">Refund</h6>
                                    <p class="mb-0 font-13">5 Jun, 16:33</p>
                                </div>
                            </div>
                            <div class="media-support-amount">
                                <h6 class="mb-1 font-15"><span class="text-secondary">-</span> 400</h6>
                                <p class="mb-0 text-success text-right font-13">USD</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Dashboard Timeline -->
        <div class="col-lg-4 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="card-header border-none bg-transparent d-flex align-items-center justify-content-between p-0 mb-30">
                        <div class="widgets-card-title">
                            <h5 class="card-title mb-0">Activity Timeline</h5>
                        </div>
                        <div class="dashboard-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dashboardDropdown6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown6">
                                    <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Active Timeline -->
                    <ul class="dashboard-active-timeline list-unstyled" id="dashboardTimeline">
                        <li class="d-flex align-items-center mb-15">
                            <div class="timeline-icon bg-primary mr-3">
                                <i class="icon_plus"></i>
                            </div>
                            <div class="timeline-info">
                                <h6 class="mb-1 font-15">Client Meeting</h6>
                                <span>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</span>
                                <p class="mb-0 font-13">25 mins ago</p>
                            </div>
                        </li>

                        <li class="d-flex align-items-center mb-15">
                            <div class="timeline-icon bg-warning mr-3">
                                <i class="icon_mic_alt"></i>
                            </div>
                            <div class="timeline-info">
                                <h6 class="mb-1 font-15">Email Newsletter</h6>
                                <span>Cupcake gummi bears soufflé caramels candy</span>
                                <p class="mb-0 font-13">29 mins ago</p>
                            </div>
                        </li>

                        <li class="d-flex align-items-center mb-15">
                            <div class="timeline-icon bg-danger mr-3">
                                <i class="icon_mail_alt"></i>
                            </div>
                            <div class="timeline-info">
                                <h6 class="mb-1 font-15">Plan Webinar</h6>
                                <span>Candy ice cream cake.</span>
                                <p class="mb-0 font-13">28 mins ago</p>
                            </div>
                        </li>

                        <li class="d-flex align-items-center mb-15">
                            <div class="timeline-icon bg-success mr-3">
                                <i class="icon_check"></i>
                            </div>
                            <div class="timeline-info">
                                <h6 class="mb-1 font-15">Launch Website</h6>
                                <span>Candy ice cream cake. </span>
                                <p class="mb-0 font-13">45 mins ago</p>
                            </div>
                        </li>

                        <li class="d-flex align-items-center mb-15">
                            <div class="timeline-icon bg-danger mr-3">
                                <i class="icon_mail_alt"></i>
                            </div>
                            <div class="timeline-info">
                                <h6 class="mb-1 font-15">Plan Webinar</h6>
                                <span>Candy ice cream cake.</span>
                                <p class="mb-0 font-13">50 mins ago</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Our Project -->
        <div class="col-lg-8 box-margin">
            <div class="card code-table">
                <div class="card-body pb-0">
                    <div class="card-header border-none bg-transparent d-flex align-items-center justify-content-between p-0 mb-30">
                        <div class="widgets-card-title">
                            <h5 class="card-title mb-0">Our Project</h5>
                        </div>
                        <div class="dashboard-dropdown">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dashboardDropdown7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-more"></i></button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dashboardDropdown7">
                                    <a class="dropdown-item" href="#"><i class="ti-pencil-alt"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="ti-eraser"></i> Remove</a>
                                    <a class="dropdown-item" href="#"><i class="ti-trash"></i> Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Code</th>
                                    <th>Date</th>
                                    <th>Budget</th>
                                    <th>Status</th>
                                    <th class="text-right">Ratings</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        #367
                                    </td>
                                    <td>
                                        8965482
                                    </td>
                                    <td>
                                        Nov 14, 2020
                                    </td>
                                    <td>
                                        $7523
                                    </td>
                                    <td><a href="#!" class="badge badge-success badge-pill">Active</a></td>
                                    <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #366
                                    </td>
                                    <td>
                                        2366482
                                    </td>
                                    <td>
                                        Nov 13, 2020
                                    </td>
                                    <td>
                                        $2334
                                    </td>
                                    <td><a href="#!" class="badge badge-danger badge-pill">Not Active</a></td>
                                    <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #856
                                    </td>
                                    <td>
                                        8832638
                                    </td>
                                    <td>
                                        Oct 14, 2020
                                    </td>
                                    <td>
                                        $2346
                                    </td>
                                    <td><a href="#!" class="badge badge-success badge-pill">Active</a></td>
                                    <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #326
                                    </td>
                                    <td>
                                        9632638
                                    </td>
                                    <td>
                                        Dec 17, 2020
                                    </td>
                                    <td>
                                        $1346
                                    </td>
                                    <td><a href="#!" class="badge badge-danger badge-pill">Not Active</a></td>
                                    <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #658
                                    </td>
                                    <td>
                                        2366482
                                    </td>
                                    <td>
                                        Nov 18, 2020
                                    </td>
                                    <td>
                                        $2334
                                    </td>
                                    <td><a href="#!" class="badge badge-danger badge-pill">Not Active</a></td>
                                    <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        #589
                                    </td>
                                    <td>
                                        3332538
                                    </td>
                                    <td>
                                        July 14, 2020
                                    </td>
                                    <td>
                                        $3246
                                    </td>
                                    <td><a href="#!" class="badge badge-success badge-pill">Active</a></td>
                                    <td class="text-right"><a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-warning"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                        <a href="#!"><i class="fa fa-star f-18 text-black-50"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection