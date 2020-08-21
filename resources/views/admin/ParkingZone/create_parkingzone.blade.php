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
                                <form id="ParkingZone" action="{{route('parkingzone.store')}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Parking Zone Name</label>
                                        <input type="text" class="form-control" name="parking_name" id="parking_name"
                                               placeholder="Parking Zone Name">
                                        <span class="help-block" id="parking_name_error" style="color:red;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Parking Zone Location</label>
                                        <select class="form-control" name="location_zone_name" id="location_zone_name">
                                            <option value="" selected hidden>Select Zone Location</option>
                                            @foreach($location_zone as $location_value)
                                                <option
                                                    value="{{$location_value->location_zone_id}}">{{$location_value->location_zone_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block" id="location_zone_name_error"
                                              style="color:red;"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Latitude</label>
                                                <input type="text" class="form-control" name="latitude" id="latitude"
                                                       placeholder="Latitude">
                                            </div>
                                            <span class="help-block" id="latitude_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity" class="col-form-label">Longitude</label>
                                            <div class="input-group">
                                                <input id="longitude" name="longitude" type="text" class="form-control"
                                                       placeholder="Longitude"
                                                       aria-label="Amount (to the nearest dollar)">
                                                <div class="input-group-append">

                                                </div>
                                                <button type="button" onclick="placeMarker()" class="btn btn-primary">
                                                    +
                                                </button>
                                            </div>
                                            <span class="help-block" id="Longitude_error" style="color:red;"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Parking Limit</label>
                                        <input type="number" min="1" class="form-control" name="parking_limit"
                                               id="parking_limit" placeholder="Parking Limit">
                                        <span class="help-block" id="parking_limit_error" style="color:red;"></span>
                                    </div>


                                    <label for="space">Space *
                                        <small class="text-success">(Click to generate space)</small>
                                        <button type="button" id="autoGenerateSerial"
                                                class="btn btn-xs bg-cyan  waves-effect">
                                            <i class="fa fa-refresh"></i>
                                        </button>

                                    </label>

                                    <div class="form-group">

                                        <input id="tags" name="parking_space" class="space" value=""/>
                                    </div>
                                    <span class="help-block" id="parking_space_error" style="color:red;"></span>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Address</label>
                                        <textarea class="form-control" id="parking_address" name="parking_address"
                                                  placeholder="Type Parking Address"></textarea>
                                        <span class="help-block" id="parking_address_error" style="color:red;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Note</label>
                                        <textarea class="form-control" id="parking_note" name="parking_note"
                                                  placeholder="Type Package Note"></textarea>
                                    </div>
{{--                                     <div class="form-group">
                                        <label for="inputState" class="col-form-label">Status</label>
                                        <select id="parking_status" name="parking_status" class="form-control">
                                            <option selected disabled hidden>Select</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="help-block" id="parking_status_error" style="color:red;"></span>
                                    </div> --}}
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
            
@endsection

