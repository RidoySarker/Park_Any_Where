@extends('admin.layouts.backend_main')
@section('title') Edit Parking Price | Park Any where @endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Edit Parking Price</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Edit Parking Price</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Parking Zone Vehicle Price info</h5>         
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    @if (Session::has('success'))
                       <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('parkingprice.update',$parking_price->parking_price_id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail111">Parking Zone</label>
                        <select class="form-control" id="edit_parking_name" name="parking_name">
                            <option selected disabled hidden>Select Parking Zone</option>
                            @foreach($parking_zone as $parking_data)
                            <option value="{{$parking_data->parking_zone_id}}" {{$parking_price->parking_name==$parking_data->parking_zone_id ? 'selected' : ''}} >{{$parking_data->parking_name}}</option>
                            @endforeach
                        </select>
                        <span class="help-block" id="parking_name_error" style="color:red;"></span>
                    </div>
                    @foreach($parking_price->vehicleprice as $value)
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
                                            <option value="{{$vehicle_data->vehicle_id}}" {{$value->vehicle_type == $vehicle_data->vehicle_id ? 'selected' : '' }}>{{$vehicle_data->vehicle_type}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <label for="price">Vehicle Time </label>
                                    <div class="form-line  ">
                                        <input name="vehicle_time[]" type="number" id="edit_vehicle_time" value="{{$value->vehicle_time}}" class="form-control" placeholder="Time" min="1" value="" >
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label for="price">Vehicle Period </label>
                                    <div class="form-line  ">
                                    <select id="edit_vehicle_period" name="vehicle_period[]" class="form-control" >
                                        <option selected disabled hidden>Select Period</option>
                                        <option value="minute" {{$value->vehicle_period == 'minute' ? 'selected' : '' }}>Minute (s)</option>
                                        <option value="hour" {{$value->vehicle_period == 'hour' ? 'selected' : '' }}>Hour (s)</option>
                                        <option value="day" {{$value->vehicle_period == 'day' ? 'selected' : '' }}>Day (s)</option>
                                        <option value="week" {{$value->vehicle_period == 'week' ? 'selected' : '' }}>Week (s)</option>
                                        <option value="month" {{$value->vehicle_period == 'month' ? 'selected' : '' }}>Month (s)</option>
                                        <option value="year" {{$value->vehicle_period == 'year' ? 'selected' : '' }}>Year (s)</option>
                                    </select>
                                    </div>
                                                                    </div> 
                                <div class="col-sm-2">
                                    <label for="price">Vehicle Charge </label>
                                    <div class="form-line  ">
                                        <input name="vehicle_charge[]" value="{{$value->vehicle_charge}}" type="text" id="edit_vehicle_charge" class="form-control" placeholder="Price" value="" >
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
                    @endforeach

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="edit_price_status" name="price_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1" {{$parking_price->price_status == '1' ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$parking_price->price_status == '0' ? 'selected' : ''}}>Inactive</option>
                            </select>
                             <span class="help-block" id="price_status_error" style="color:red;"></span>
                        </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-success mb-2 mr-2">Update</button>
                    </div>
                </form>

            </div>

        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection 

@section('script')
<script type="text/javascript" src="{{asset('ajax/parkingprice.js')}}"></script>
@endsection
