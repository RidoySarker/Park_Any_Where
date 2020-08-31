@extends('admin.layouts.backend_main')
@section('title') User Access | Park Any where @endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">User Access</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">User Access</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <br/>
                            <h4 class="card-title mb-3">User Access List</h4>
                            <label>Search:<input type="search" id="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="selection-datatable"></label>

                            <div id="datalist"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="user_access_update" method="PUT">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail111">User Email</label>
                        <input type="text" class="form-control" id="user_email" readonly disabled>
                        <input type="hidden" class="form-control" id="user_id" name="id">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail111">User Role</label>
                        <select class="form-control" name="role" id="role">
                            <option select hidden>Select</option>
                            @foreach($roles as $value)
                            <option> {{$value['name']}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" id="old_role" name="old_role">
                        <span class="help-block" id="vehicle_type_error" style="color:red;"></span>
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
<script type="text/javascript" src="{{asset('ajax/useraccess.js')}}"></script>
@endsection
