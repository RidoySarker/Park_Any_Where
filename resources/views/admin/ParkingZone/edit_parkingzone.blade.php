@extends('admin.layouts.backend_main')
@section('title') Edit Parking Zone | Park Any where @endsection
@section('main_content')

    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Edit Parking Zone</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Parking Zone</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form row -->
            <div class="row">
                <div class="col-xl-6 box-margin height-card">
                    <div class="card card-body">
                        <h4 class="card-title">Edit Parking Zone</h4>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form id="ParkingZone" action="{{route('parkingzone.store')}}" method="PUT"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" name="parking_zone_id"
                                           value="{{$edit_data->parking_zone_id}}">
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Parking Zone Name</label>
                                        <input type="text" class="form-control" name="parking_name"
                                               value="{{$edit_data->parking_name}}" id="parking_name"
                                               placeholder="Parking Zone Name">
                                        <span class="help-block" id="parking_name_error" style="color:red;"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Parking Zone Location</label>
                                        <select class="form-control" name="location_zone_name" id="location_zone_name">
                                            <option value="" selected hidden>Select Zone Location</option>
                                            @foreach($location_zone as $location_value)
                                                <option
                                                    value="{{$location_value->location_zone_id}}" {{$location_value->location_zone_id==$edit_data->location_zone_name ? "selected" : ''}}>{{$location_value->location_zone_name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block" id="location_zone_name_error"
                                              style="color:red;"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail111">Latitude</label>
                                                <input type="text" value="{{$edit_data->latitude}}" class="form-control"
                                                       name="latitude" id="latitude" placeholder="Latitude">
                                            </div>
                                            <span class="help-block" id="latitude_error" style="color:red;"></span>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputCity" class="col-form-label">Longitude</label>
                                            <div class="input-group">
                                                <input id="longitude" value="{{$edit_data->longitude}}" name="longitude"
                                                       type="text" class="form-control" placeholder="Longitude"
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
                                        <label for="exampleInputEmail111">Parking Type</label>
                                        <select class="form-control" name="parking_type" id="parking_type">
                                            <option value="" hidden selected>Select Parking Type</option>
                                            <option value="1" {{$edit_data->parking_type==1 ? "selected" : ''}}>
                                                Package
                                            </option>
                                            <option value="2" {{$edit_data->parking_type==2 ? "selected" : ''}}>
                                                Vehicle
                                            </option>
                                        </select>
                                    </div>
                                    <span class="help-block" id="parking_type_error" style="color:red;"></span>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Parking Limit</label>
                                        <input type="number" value="{{$edit_data->parking_limit}}" class="form-control"
                                               name="parking_limit" min="1" id="parking_limit"
                                               placeholder="Parking Limit">
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

                                        <input readonly="" id="tags" name="parking_space" class="space" value=""/>
                                    </div>
                                    <span class="help-block" id="parking_space_error" style="color:red;"></span>
                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Address</label>
                                        <textarea class="form-control" id="parking_address" name="parking_address"
                                                  placeholder="Type Parking Address">{{$edit_data->parking_address}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail111">Note</label>
                                        <textarea class="form-control" id="parking_note" name="parking_note"
                                                  placeholder="Type Package Note">{{$edit_data->parking_note}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState" class="col-form-label">Status</label>
                                        <select id="parking_status" name="parking_status" class="form-control">
                                            <option selected disabled hidden>Select</option>
                                            <option value="1" {{$edit_data->parking_status=1 ? 'selected' : ''}}>
                                                Active
                                            </option>
                                            <option value="0" {{$edit_data->parking_status=0 ? 'selected' : ''}}>
                                                Inactive
                                            </option>
                                        </select>
                                        <span class="help-block" id="parking_status_error" style="color:red;"></span>
                                    </div>
                                    <button type="submit" class="update btn btn-primary mr-2 mt-15">Update</button>
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
            <script type="text/javascript" src="{{asset('ajax/edit_parkingzone.js')}}"></script>

@endsection

