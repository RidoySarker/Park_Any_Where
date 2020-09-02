@extends('admin.layouts.backend_main')
@section('title', 'Location Zone | ParkAnyWhere')
@section('css')
@endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Location Zone List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">location_zone</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            @can('ZoneAdd')
                                <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Add Location Zone</button>
                            @endcan
                            <br />
                            <h4 class="card-title mb-3">Location Zone List</h4>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Add Location Zone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
            <form id="location_zone_add" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="location_zone_name">Location Zone Name</label>
                        <input type="text" class="form-control" id="location_zone_name" name="location_zone_name" placeholder="Enter Location Zone Name">
                        <span class="help-block" id="location_zone_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="location_zone_description" class="col-form-label">Description</label>
                            <div class="input-group">
                                <input id="location_zone_description" name="location_zone_description" type="text" class="form-control" placeholder="Location Zone Description">
                            </div>
                                <span class="help-block" id="location_zone_description_error" style="color:red;"></span>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="location_zone_status" name="location_zone_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="help-block" id="location_zone_status_error" style="color:red;"></span>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Location Zone</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="location_zone_update" method="PUT">
                    @csrf
                    <input type="hidden" id="edit_location_zone_id" name="location_zone_id">

                    <div class="form-group">
                        <label for="edit_location_zone_name">Location Zone Name</label>
                        <input type="text" class="form-control" id="edit_location_zone_name" name="location_zone_name" placeholder="Enter Location Zone Name">
                    </div>
                        <span class="help-block" id="location_zone_name_edit" style="color:red;"></span>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_location_zone_description" class="col-form-label">Description</label>
                            <div class="input-group">
                                <input id="edit_location_zone_description" name="location_zone_description" type="text" class="form-control" placeholder="Location Zone Description">
                            </div>
                                <span class="help-block" id="location_zone_description_edit" style="color:red;"></span>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="edit_location_zone_status" class="col-form-label">Status</label>
                            <select id="edit_location_zone_status" name="location_zone_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                            <span class="help-block" id="location_zone_status_edit" style="color:red;"></span>

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
<script type="text/javascript" src="{{asset('ajax/locationzone.js')}}"></script>
@endsection
