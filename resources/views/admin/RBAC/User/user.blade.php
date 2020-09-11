@extends('admin.layouts.backend_main')
@section('title', 'Add User | ParkAnyWhere')
@section('css')
@endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">User List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">

                            @can('PaymentAdd')
                                <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Add User</button>
                            @endcan

                            <br />
                            <h4 class="card-title mb-3">User List</h4>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
            <form id="add_user" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name" class="form-control" name="name" type="text"  placeholder="Name" >
                            <span class="help-block" id="name_error" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label for="account-name">Gender</label>
                                <div class="input-group">
                                    <div class="d-inline-block custom-control custom-radio mr-1">
                                        <input type="radio" name="gender" class="custom-control-input gender" id="male" value="1">
                                        <label class="custom-control-label" for="male">Male</label>
                                    </div>
                                    <div class="d-inline-block custom-control custom-radio">
                                        <input type="radio" name="gender" class="custom-control-input gender" id="female" value="2">
                                        <label class="custom-control-label" for="female">Female</label>
                                    </div>
                                </div>
                                <span class="help-block" id="gender_error" style="color:red;"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" name="email" type="text" placeholder="Enter Email" >
                        	<span class="help-block" id="email_error" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="number">Phone</label>
                            <input id="number" class="form-control" name="number" type="text"placeholder="Enter Phone Number" >
                        	<span class="help-block" id="number_error" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                            <span class="icon"></span>
                        	<span class="help-block" id="password_error" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="retype_password">Retype Password</label>
                            <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype New Password">
                            <span class="retype_icon"></span>
                        </div>

                    <div class="form-group">
                        <label for="inputState" class="col-form-label">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option selected disabled hidden>Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span class="help-block" id="status_error" style="color:red;"></span>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="user_update" method="PUT">
                    @csrf
                    <input type="hidden" id="edit_user_id" name="id">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="edit_name" class="form-control" name="name" type="text"  placeholder="Name" >
                            <span class="help-block" id="name_edit_error" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="inputState" class="col-form-label">Gender</label>
                            <select id="edit_gender" name="gender" class="form-control">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                            <span class="help-block" id="status_edit_error" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="edit_email" class="form-control" name="email" type="text" placeholder="Enter Email" >
                            <span class="help-block" id="email_edit_error" style="color:red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="number">Phone</label>
                            <input id="edit_number" class="form-control" name="number" type="text"placeholder="Enter Phone Number" >
                            <span class="help-block" id="number_edit_error" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="edit_status" name="status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="help-block" id="status_edit_error" style="color:red;"></span>
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
<script type="text/javascript" src="{{asset('ajax/add_user.js')}}"></script>
@endsection
