@extends('admin.layouts.backend_main')
@section('title') Parking Price | Park Any where @endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Parking Price</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Parking Price</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            @can('ParkingPriceAdd')
                                <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Add Parking Price</button>
                            @endcan
                            <br/>
                            <h4 class="card-title mb-3">Parking Price List</h4>
                            <label>Search:<input type="search" id="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="selection-datatable"></label>

                            <div id="datalist"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Parking Price</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
                <form id="parking_price_store" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail111">Parking Zone</label>
                        <select class="form-control" id="parking_name" name="parking_name">
                            <option selected disabled hidden>Select Parking Zone</option>
                            @foreach($parking_zone as $parking_data)
                            <option value="{{$parking_data->parking_zone_id}}">{{$parking_data->parking_name}}</option>
                            @endforeach
                        </select>
                        <span class="help-block" id="parking_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">

                        <div class="form-group" id="price">
                            <div class="row VehicleInfo">
                                <div class="col-sm-3">
                                    <label for="price">Vehicle Info </label>
                                    <div class="form-group">
                                        <div class="form-line  ">
                                        <select class="form-control" id="vehicle_type" name="vehicle_type[]">
                                            <option selected disabled hidden>Select Vehicle</option>
                                            @foreach($vehicle as $vehicle_data)
                                            <option value="{{$vehicle_data->vehicle_id}}">{{$vehicle_data->vehicle_type}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label for="price">Vehicle Time </label>
                                    <div class="form-line  ">
                                        <input name="vehicle_time[]" type="number" id="data_vehicle_time" class="form-control" placeholder="Time" min="1" value="" >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="price">Vehicle Period </label>
                                    <div class="form-line  ">
                                    <select id="data_vehicle_period" name="vehicle_period[]" class="form-control" >
                                        <option selected disabled hidden>Select Period</option>
                                        <option value="minute">Minute (s)</option>
                                        <option value="hour">Hour (s)</option>
                                        <option value="day">Day (s)</option>
                                        <option value="week">Week (s)</option>
                                        <option value="month">Month (s)</option>
                                        <option value="year">Year (s)</option>
                                    </select>
                                    </div>
                                                                    </div>
                                <div class="col-sm-2">
                                    <label for="price">Vehicle Charge </label>
                                    <div class="form-line  ">
                                        <input name="vehicle_charge[]" type="text" id="data_vehicle_charge" class="form-control" placeholder="Price" value="" >
                                    </div>
                                </div>
                                <div class="col-sm-2" style="margin-top: 29px;">
                                    <button type="button" class="btn btn-success waves-effect btn-xs addItem"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-danger waves-effect btn-xs removeItem"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="price_status" name="price_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                             <span class="help-block" id="price_status_error" style="color:red;"></span>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-success mb-2 mr-2 submit">Submit</button>
                        <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="parking_price_update" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail111">Parking Zone</label>
                        <select class="form-control" id="edit_parking_name" name="parking_name">
                            <option selected disabled hidden>Select Parking Zone</option>
                            @foreach($parking_zone as $parking_data)
                            <option value="{{$parking_data->parking_zone_id}}">{{$parking_data->parking_name}}</option>
                            @endforeach
                        </select>
                        <span class="help-block" id="parking_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">

                        <div class="form-group" id="price">
                            <div class="row VehicleInfo">
                                <div class="col-sm-3">
                                    <label for="price">Vehicle Info </label>
                                    <div class="form-group">
                                        <div class="form-line  ">
                                        <select class="form-control" id="edit_vehicle_type" name="vehicle_type[]">
                                            <option selected disabled hidden>Select Vehicle</option>
                                            @foreach($vehicle as $vehicle_data)
                                            <option value="{{$vehicle_data->vehicle_id}}">{{$vehicle_data->vehicle_type}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label for="price">Vehicle Time </label>
                                    <div class="form-line  ">
                                        <input name="vehicle_time[]" type="number" id="edit_vehicle_time" class="form-control" placeholder="Time" min="1" value="" >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="price">Vehicle Period </label>
                                    <div class="form-line  ">
                                    <select id="edit_vehicle_period" name="vehicle_period[]" class="form-control" >
                                        <option selected disabled hidden>Select Period</option>
                                        <option value="minute">Minute (s)</option>
                                        <option value="hour">Hour (s)</option>
                                        <option value="day">Day (s)</option>
                                        <option value="week">Week (s)</option>
                                        <option value="month">Month (s)</option>
                                        <option value="year">Year (s)</option>
                                    </select>
                                    </div>
                                                                    </div>
                                <div class="col-sm-2">
                                    <label for="price">Vehicle Charge </label>
                                    <div class="form-line  ">
                                        <input name="vehicle_charge[]" type="text" id="edit_vehicle_charge" class="form-control" placeholder="Price" value="" >
                                    </div>
                                </div>
                                <div class="col-sm-2" style="margin-top: 29px;">
                                    <button type="button" class="btn btn-success waves-effect btn-xs addItem"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-danger waves-effect btn-xs removeItem"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="edit_price_status" name="price_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                             <span class="help-block" id="price_status_error" style="color:red;"></span>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-success mb-2 mr-2 submit">Update</button>
                        <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('ajax/parkingprice.js')}}"></script>
@endsection
