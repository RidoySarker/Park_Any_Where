@extends('admin.layouts.backend_main')
@section('title') Package | Park Any where @endsection
@section('main_content')
<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">App Settings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">App Settings</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- App Settings area Start -->
                <div class="col-12 box-margin height-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Application Logo</label>
                                </div>
                                <div class="profile-heading-thumb mr-3">
                                    <img alt="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Application Name</label>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" placeholder="Type Something..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Email</label>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" placeholder="Type Something..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Phone</label>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" placeholder="Type Something..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Address</label>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" placeholder="Type Something..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="col-form-label">Submit</label>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-rounded mb-2 mr-2 update">Update</button>
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
