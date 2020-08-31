@extends('admin.layouts.backend_main')
@section('title') Role Permission | Park Any where @endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Role Permission</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Role Permission</li>
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
                            <h4 class="card-title mb-3">Role Permission List</h4>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Role Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="rolepermission_update" method="PUT">
                    @csrf
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="text-center" id="role_name"></h1>
                                    <input type="hidden" name="id" id="edit_id">
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table datatable-pagination">
                                        <thead>
                                        <tr>
                                            <th>Permissions</th>
                                            <th>Module</th>
                                        </tr>
                                        </thead>
                                        <tbody id="permission_box">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="submit btn btn-primary">Update</button>
                                <button type="" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection 

@section('script')
<script type="text/javascript" src="{{asset('ajax/rolepermission.js')}}"></script>
@endsection
