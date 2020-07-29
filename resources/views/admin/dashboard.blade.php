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


    </div>
</div>
@endsection