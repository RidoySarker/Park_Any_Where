@extends('admin.layouts.backend_main')
@section('title') Add Parking Zone | Park Any where @endsection
@section('main_content')

            <div class="main-content">
                <!-- Basic Form area Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-18">Add Parking Zone</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Add Parking Zone</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form row -->
                    <div class="row">
                        <div class="col-xl-6 box-margin height-card">
                            <div class="card card-body">
                                <h4 class="card-title">New Parking Zone</h4>
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <form id="ParkingZone" action="{{route('parkingzone.store')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Parking Zone Name</label>
                                                <input type="text" class="form-control" name="parking_name" id="parking_name" placeholder="Parking Zone Name">
                                                <span class="help-block" id="parking_name_error" style="color:red;"></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label for="exampleInputEmail111">Latitude</label>
                                                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Latitude">
                                                    </div>
                                                    <span class="help-block" id="latitude_error" style="color:red;"></span>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Longitude</label>
                                                    <div class="input-group">
                                                        <input id="longitude" name="longitude" type="text" class="form-control" placeholder="Longitude" aria-label="Amount (to the nearest dollar)" >
                                                        <div class="input-group-append">

                                                        </div>
                                                        <button type="button" onclick="placeMarker()" class="btn btn-primary">+</button>
                                                    </div>
                                                    <span class="help-block" id="Longitude_error" style="color:red;"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Parking Type</label>
                                                <select class="form-control" name="parking_type" id="parking_type">
                                                    <option value="" hidden selected>Select Parking Type</option>
                                                    <option value="1">Package</option>
                                                    <option value="2">Vehicle</option>
                                                </select>
                                            </div>
                                            <span class="help-block" id="parking_type_error" style="color:red;"></span>

                                            <div class="form-group" id="package_name">
                                                <label for="exampleInputEmail111">Package Name</label>
                                                <select class="form-control" name="package_name">
                                                    <option value="" hidden selected>Select Package</option>
                                                    @foreach($package_data as $package_value)
                                                    <option value="{{$package_value->package_id}}">{{$package_value->package_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                             <span class="help-block" id="package_name_error" style="color:red;"></span>

                                            <div class="form-group" id="vehicle_type">
                                                <label for="exampleInputEmail111">Vehicle Type</label>
                                                <select class="form-control" name="vehicle_type" >
                                                    <option value="" hidden selected>Select Vehicle</option>
                                                    @foreach($vehicle_data as $vehicle_value)
                                                    <option value="{{$vehicle_value->vehicle_id}}">{{$vehicle_value->vehicle_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="help-block" id="vehicle_type_error" style="color:red;"></span>

                                            <!-- Package Data -->
{{--                                             <div class="form-row">
                                                <div class="form-group col-md-6" id="package_charge">
                                                    <label for="inputCity" class="col-form-label">Charge</label>
                                                    <div class="input-group">
                                                        <input id="data_package_charge"  name="package_charge" type="number" class="form-control" placeholder="Charge" aria-label="Amount (to the nearest dollar)" readonly>

                                                    </div>
                                                    <span class="help-block" id="vehicle_time_error" style="color:red;"></span>
                                                </div>

                                                <div class="form-group col-md-3" id="package_time">
                                                    <label for="inputCity" class="col-form-label">Time</label>
                                                    <div class="input-group">
                                                        <input id="data_package_time"  name="package_time" type="number" class="form-control" placeholder="Time" readonly>

                                                    </div>
                                                    <span class="help-block" id="vehicle_time_error" style="color:red;"></span>
                                                </div>

                                                <div class="form-group col-md-3" id="package_period">
                                                    <label for="inputState" class="col-form-label">Period</label>
                                                    <select id="data_package_period" name="package_period" class="form-control" >
                                                        <option value="minute"> Minute(s) </option>
                                                        <option value="hour"> Hour(s) </option>
                                                        <option value="day"> Day(s) </option>
                                                        <option value="week"> Week(s) </option>
                                                        <option value="month"> Month(s) </option>
                                                        <option value="year"> Year(s) </option>
                                                    </select>
                                                </div>

                                            </div> --}}
                                            <!-- Package Data -->


                                            <!-- Vehicle Type Data -->
                                            <div class="form-row">
                                                <div class="form-group col-md-6" id="parking_charge">
                                                    <label for="inputCity" class="col-form-label">Charge</label>
                                                    <div class="input-group">
                                                        <input id="data_parking_charge"  type="number" class="form-control" placeholder="Charge" readonly>

                                                    </div>
                                                    <span class="help-block" id="parking_charge_error" style="color:red;"></span>
                                                </div>

                                                <div class="form-group col-md-3" id="parking_time">
                                                    <label for="inputCity" class="col-form-label">Time</label>
                                                    <div class="input-group">
                                                        <input id="data_parking_time"   type="number" class="form-control" placeholder="Time" readonly="" >

                                                    </div>
                                                    <span class="help-block" id="parking_time_error" style="color:red;"></span>
                                                </div>

                                                <div class="form-group col-md-3" id="parking_period">
                                                    <label for="inputState" class="col-form-label">Period</label>
                                                    <select id="data_parking_period" class="form-control" disabled >
                                                        <option selected disabled hidden>Choose</option>
                                                        <option value="minute">Minute (s)</option>
                                                        <option value="hour">Hour (s)</option>
                                                        <option value="day">Day (s)</option>
                                                        <option value="week">Week (s)</option>
                                                        <option value="month">Month (s)</option>
                                                        <option value="year">Year (s)</option>
                                                    </select>
                                                    <span class="help-block" id="parking_period_error" style="color:red;"></span>
                                                </div>

                                            </div>
                                            <!-- Vehicle Type Data -->

                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Parking Limit</label>
                                                <input type="number" min="1" class="form-control" name="parking_limit" id="parking_limit" placeholder="Parking Limit">
                                            <span class="help-block" id="parking_limit_error" style="color:red;"></span>
                                            </div>



                                            <label for="space">Space *
                                            <small class="text-success">(Click to generate space)</small>
                                            <button type="button" id="autoGenerateSerial" class="btn btn-xs bg-cyan  waves-effect">
                                                <i class="fa fa-refresh"></i>
                                            </button>

                                            </label>

                                            <div class="form-group">

                                                <input id="tags" name="parking_space" class="space"  value="" />
                                            </div>
                                            <span class="help-block" id="parking_space_error" style="color:red;"></span>
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Address</label>
                                                <textarea  class="form-control"  id="parking_address" name="parking_address" placeholder="Type Parking Address"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Note</label>
                                                <textarea  class="form-control"  id="parking_note" name="parking_note" placeholder="Type Package Note"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputState" class="col-form-label">Status</label>
                                                <select id="parking_status" name="parking_status" class="form-control">
                                                    <option selected disabled hidden>Select</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            <span class="help-block" id="parking_status_error" style="color:red;"></span>
                                            </div>
                                            <button type="submit" class="submit btn btn-primary mr-2 mt-15">Submit</button>
                                            <button type="reset" class="btn btn-danger mt-15">Reset</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 box-margin height-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Google Map</h4>
                                    <h4 id="error" class="text-danger">Location tracked automatically.</h4>

                                        <div id="map" style="width:100%;height:500px"></div>



                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->


                </div>


            </div>

@endsection

@section('script')
<script type="text/javascript" src="{{asset('ajax/parkingzone.js')}}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDXkzEIj9sB3J_ohqT0woVWqAJQiyRmAE&maptype=roadmap&libraries=places&callback=initMap"></script>
@endsection

