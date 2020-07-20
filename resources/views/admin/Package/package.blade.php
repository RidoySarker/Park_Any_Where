@extends('admin.layouts.backend_main')
@section('title') Package | Park Any where @endsection
@section('main_content')
<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Packages</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Packages</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Add Package</button>
                            <br />
                            <h4 class="card-title mb-3">Packages List</h4>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Add Package</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
                <form id="package_save" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail111">Package Name</label>
                        <input type="text" class="form-control" id="package_name" name="package_name" placeholder="Enter Package Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Vehicle Type</label>
                        <select class="form-control" id="vehicle_type" name="vehicle_type"">
                            <option >Select Vehicle Type</option>
                            @foreach($data as $value)
                            <option value = " {{$value->vehicle_id}}">{{$value->vehicle_type}}</option>

                            @endforeach
                        </select>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail111">Time</label>
                            <input type="text" class="form-control" id="package_time" name="package_time" placeholder="Enter Time ">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Period</label>
                            <select id="package_period" name="package_period" class="form-control">
                                <option selected disabled hidden>Select Period</option>
                                <option value="minute"> Minute(s) </option>
                                <option value="hour"> Hour(s) </option>
                                <option value="day"> Day(s) </option>
                                <option value="week"> Week(s) </option>
                                <option value="month"> Month(s) </option>
                                <option value="year"> Year(s) </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail111">Charge</label>
                        <input type="text" class="form-control" id="package_charge" name="package_charge" placeholder="Enter Charge ">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Note</label>
                        <textarea  class="form-control"  id="package_note" name="package_note" placeholder="Type Package Note"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputState" class="col-form-label">Status</label>
                        <select id="package_status" name="package_status" class="form-control">
                            <option selected disabled hidden>Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
                <form id="package_update" method="PUT">
                    @csrf
                    <input type="hidden" id="edit_package_id" name="package_id">
                    <div class="form-group">
                        <label for="exampleInputEmail111">Package Name</label>
                        <input type="text" class="form-control" id="edit_package_name" name="package_name" placeholder="Enter Package Name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Vehicle Type</label>
                        <select class="form-control" id="edit_vehicle_type" name="vehicle_type"">
                            <option >Select Vehicle Type</option>
                            @foreach($data as $value)
                            <option  value ="{{$value->vehicle_id}}">{{$value->vehicle_type}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail111">Time</label>
                            <input type="text" class="form-control" id="edit_package_time" name="package_time" placeholder="Enter Time ">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputState" class="col-form-label">Period</label>
                            <select id="edit_package_period" name="package_period" class="form-control">
                                <option selected disabled hidden>Select Period</option>
                                <option value="minute"> Minute(s) </option>
                                <option value="hour"> Hour(s) </option>
                                <option value="day"> Day(s) </option>
                                <option value="week"> Week(s) </option>
                                <option value="month"> Month(s) </option>
                                <option value="year"> Year(s) </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail111">Charge</label>
                        <input type="text" class="form-control" id="edit_package_charge" name="package_charge" placeholder="Enter Charge ">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">Note</label>
                        <textarea class="form-control" aria-label="With textarea" id="edit_package_note" name="package_note" placeholder="Note">
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputState" class="col-form-label">Status</label>
                        <select id="edit_package_status" name="package_status" class="form-control">
                            <option selected disabled hidden>Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
@endsection @section('script')
<script type="text/javascript" src="{{asset('ajax/package.js')}}"></script>
@endsection
