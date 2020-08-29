@extends('frontend.layouts.frontend_main')
@section('title') Add Parking Zone | Park AnyWhere @endsection
@section('css')

@endsection
@section('content')

    <div class="main-content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Add Parking Zone</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
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
                                    <label for="exampleInputEmail111">Parking Zone Name</label>
                                    <div class="form-group">

                                        <input type="text" class="form-control" name="parking_name" id="parking_name"
                                               placeholder="Parking Zone Name">
                                    </div>
                                    <span class="help-block" id="parking_name_error" style="color:red;"></span>
                                    <label for="exampleInputEmail111">Parking Zone Location</label>
                                    <div class="form-group">

                                        <select class="form-control" name="location_zone_name" id="location_zone_name">
                                            <option value="" selected hidden>Select Zone Location</option>
                                            @foreach($location_zone as $location_value)
                                                <option
                                                    value="{{$location_value->location_zone_id}}">{{$location_value->location_zone_name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <span class="help-block" id="location_zone_name_error"
                                          style="color:red;"></span>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label>Latitude *</label>
                                            <div class="form-group">
                                                <input readonly type="text" class="form-control" name="latitude"
                                                       id="latitude"
                                                       placeholder="Latitude">
                                            </div>
                                            <span class="help-block" id="vehicle_time_error" style="color:red;"></span>

                                        </div>


                                        <div class="col-md-6">
                                            <label>Longitude *</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input readonly id="longitude" name="longitude" type="text"
                                                           class="form-control"
                                                           placeholder="Longitude"
                                                           aria-label="Amount (to the nearest dollar)">
                                                    <div class="input-group-append">

                                                    </div>
                                                    <button type="button" onclick="placeMarker()"
                                                            class="btn btn-primary">
                                                        <i class="fa fa-hand-pointer-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <span class="help-block" id="Longitude_error" style="color:red;"></span>

                                        </div>

                                    </div>
                                    <label for="exampleInputEmail111">Parking Limit</label>
                                    <div class="form-group">
                                        <input type="number" min="1" class="form-control" name="parking_limit"
                                               id="parking_limit" placeholder="Parking Limit">

                                    </div>
                                    <span class="help-block" id="parking_limit_error" style="color:red;"></span>
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
                                    <label for="exampleInputEmail111">Address</label>
                                    <div class="form-group">
                                        <textarea class="form-control" id="parking_address" name="parking_address"
                                                  placeholder="Type Parking Address"></textarea>

                                    </div>
                                    <span class="help-block" id="parking_address_error" style="color:red;"></span>
                                    <label for="exampleInputEmail111">Note</label>
                                    <div class="form-group">
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
                                    <button type="submit" style="background: green;padding: 7px 10px;margin-top: -1px;"
                                            class="submit btn btn-primary">Submit
                                    </button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
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

            @endsection

            @section('js')

                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDXkzEIj9sB3J_ohqT0woVWqAJQiyRmAE&maptype=roadmap&libraries=places&callback=initMap"></script>
                <script type="text/javascript" src="{{asset('ajax/parkingzone.js')}}"></script>

@endsection
