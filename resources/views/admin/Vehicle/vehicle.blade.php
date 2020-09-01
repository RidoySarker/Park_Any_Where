@extends('admin.layouts.backend_main')
@section('title') Vehicle | Park Any where @endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Vehicle</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Vehicle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            @can('AddVehicle')
                            <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Add Vehicle</button>
                            @endcan
                            <br/>
                            <h4 class="card-title mb-3">Vehicle List</h4>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
                <form id="vehicle_save" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail111">Vehicle Type</label>
                        <input type="text" class="form-control" id="vehicle_type" name="vehicle_type" placeholder="Enter Vehicle Type" >
                        <span class="help-block" id="vehicle_type_error" style="color:red;"></span>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="col-form-label">Time</label>
                            <div class="input-group">
                                <input id="vehicle_time" name="vehicle_time" type="number" class="form-control" placeholder="Time" aria-label="Amount (to the nearest dollar)" >

                            </div>
                            <span class="help-block" id="vehicle_time_error" style="color:red;"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Period</label>
                            <select id="vehicle_period" name="vehicle_period" class="form-control" >
                                <option selected disabled hidden>Choose</option>
                                <option value="minute">Minute (s)</option>
                                <option value="hour">Hour (s)</option>
                                <option value="day">Day (s)</option>
                                <option value="week">Week (s)</option>
                                <option value="month">Month (s)</option>
                                <option value="year">Year (s)</option>
                            </select>
                            <span class="help-block" id="vehicle_period_error" style="color:red;"></span>
                        </div>
                         
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="col-form-label">Charge</label>
                            <div class="input-group">
                                <input id="vehicle_charge" name="vehicle_charge" type="number" class="form-control" placeholder="Charge" aria-label="Amount (to the nearest dollar)" >
                                <div class="input-group-append">

                                </div>
                                <span class="input-group-text">৳</span>
                            </div>
                            <span class="help-block" id="vehicle_charge_error" style="color:red;"></span>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="vehicle_status" name="vehicle_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                             <span class="help-block" id="vehicle_status_error" style="color:red;"></span>
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="vehicle_update" method="PUT">
                    @csrf
                    <input type="hidden" id="edit_vehicle_id" name="vehicle_id">
                    <div class="form-group">
                        <label for="exampleInputEmail111">Vehicle Type</label>
                        <input type="text" class="form-control" id="edit_vehicle_type" name="vehicle_type" placeholder="Enter Vehicle Type" >
                        <span class="help-block" id="vehicle_type_edit" style="color:red;"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="col-form-label">Time</label>
                            <div class="input-group">
                                <input id="edit_vehicle_time" name="vehicle_time" type="number" class="form-control" placeholder="Time" aria-label="Amount (to the nearest dollar)" >

                            </div>
                            <span class="help-block" id="vehicle_time_edit" style="color:red;"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Period</label>
                            <select id="edit_vehicle_period" name="vehicle_period" class="form-control" >
                                <option selected disabled hidden>Choose</option>
                                <option value="minute">Minute (s)</option>
                                <option value="hour">Hour (s)</option>
                                <option value="day">Day (s)</option>
                                <option value="week">Week (s)</option>
                                <option value="month">Month (s)</option>
                                <option value="year">Year (s)</option>
                            </select>
                            <span class="help-block" id="vehicle_period_edit" style="color:red;"></span>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity" class="col-form-label">Charge</label>
                            <div class="input-group">
                                <input id="edit_vehicle_charge" name="vehicle_charge" type="number" class="form-control" placeholder="Charge" aria-label="Amount (to the nearest dollar)" >
                                <div class="input-group-append">

                                </div>
                                <span class="input-group-text">৳</span>
                            </div>
                            <span class="help-block" id="vehicle_charge_edit" style="color:red;"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="edit_vehicle_status" name="vehicle_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="help-block" id="vehicle_status_edit" style="color:red;"></span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-rounded btn-success mb-2 mr-2 update">Update</button>
                        <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection 

@section('script')
<script type="text/javascript" src="{{asset('ajax/vehicle.js')}}"></script>
@endsection
