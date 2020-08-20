@extends('admin.layouts.backend_main')
@section('title') App Settings | Park Any where @endsection
@section('main_content')
<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Application Settings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Application Settings</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Change Settings</button>
                            <br />
                            <h4 class="card-title mb-3">Application Settings</h4>

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
                <h5 class="modal-title" id="exampleModalLongTitle">App Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
                <form class="cmxform col-12" id="application_settings" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="application_logo">Application Logo</label>
                        <input id="application_logo" class="form-control" name="application_logo" type="file">
                    </div>
                    <div class="form-group">
                        <label for="application_name">Application Name</label>
                        <input id="application_name" class="form-control" name="application_name" type="text">
                        <span class="help-block" id="application_name_error" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="application_email">Application Email</label>
                        <input id="application_email" class="form-control" name="application_email" type="text">
                        <span class="help-block" id="application_email_error" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="application_phone">Phone</label>
                        <input id="application_phone" class="form-control" name="application_phone" type="text">
                        <span class="help-block" id="application_phone_error" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="application_address">Address</label>
                        <input id="application_address" class="form-control" name="application_address" type="text">
                        <span class="help-block" id="application_address_error" style="color:red;"></span>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mr-2 submit">Submit</button>

                </form>

            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit App Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="cmxform col-12" id="application_settings_update" method="PUT">
                    @csrf
                    <input type="hidden" id="edit_appsettings_id" name="appsettings_id">
                    <div class="form-group">
                        <label for="application_logo">Application Logo</label>
                        <input id="edit_application_logo" class="form-control" name="application_logo" type="file">
                    </div>
                    <div class="form-group">
                        <label for="application_name">Application Name</label>
                        <input id="edit_application_name" class="form-control" name="application_name" type="text">
                        <span class="help-block" id="application_name_edit" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="application_email">Application Email</label>
                        <input id="edit_application_email" class="form-control" name="application_email" type="text">
                        <span class="help-block" id="application_email_edit" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="application_phone">Phone</label>
                        <input id="edit_application_phone" class="form-control" name="application_email" type="text">
                        <span class="help-block" id="application_email_edit" style="color:red;"></span>
                    </div>
                    <div class="form-group">
                        <label for="application_address">Address</label>
                        <input id="edit_application_address" class="form-control" name="application_address" type="text">
                        <span class="help-block" id="application_address_edit" style="color:red;"></span>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2 mr-2 update">Update</button>
                    <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2" data-dismiss="modal">Close</button>
                </form>


            </div>

        </div>
    </div>
</div>
@endsection @section('script')
<script type="text/javascript" src="{{asset('ajax/applicationsettings.js')}}"></script>
@endsection