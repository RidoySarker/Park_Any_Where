@extends('admin.layouts.backend_main')
@section('title', 'Payment Method | ParkAnyWhere') 
@section('css')
@endsection
@section('main_content')

<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Payment Method List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Payment_Method</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 box-margin">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right" data-toggle="modal" data-target="#addModal">Add Payment_Method</button>
                            <br />
                            <h4 class="card-title mb-3">Payment Method List</h4>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Add Payment Method</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="body">
            <form id="payment_method_add" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="payment_method_name">Payment Method Name</label>
                        <input type="text" class="form-control" id="payment_method_name" name="payment_method_name" placeholder="Enter Payment Method Name">
                        <span class="help-block" id="payment_method_name_error" style="color:red;"></span>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="payment_method_description" class="col-form-label">Description</label>
                            <div class="input-group">
                                <input id="payment_method_description" name="payment_method_description" type="text" class="form-control" placeholder="Method Type Description">
                            </div>
                                <span class="help-block" id="payment_method_description_error" style="color:red;"></span>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="inputState" class="col-form-label">Status</label>
                            <select id="payment_method_status" name="payment_method_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <span class="help-block" id="payment_method_status_error" style="color:red;"></span>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Payment Method</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="payment_method_update" method="PUT">
                    @csrf
                    <input type="hidden" id="edit_payment_method_id" name="payment_method_id">

                    <div class="form-group">
                        <label for="edit_payment_method_name">Payment Method Name</label>
                        <input type="text" class="form-control" id="edit_payment_method_name" name="payment_method_name" placeholder="Enter Payment Method Name">
                    </div>
                        <span class="help-block" id="payment_method_name_edit" style="color:red;"></span>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_payment_method_description" class="col-form-label">Description</label>
                            <div class="input-group">
                                <input id="edit_payment_method_description" name="payment_method_description" type="text" class="form-control" placeholder="Method Type Description">
                            </div>
                                <span class="help-block" id="payment_method_description_edit" style="color:red;"></span>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="payment_method_status_edit" class="col-form-label">Status</label>
                            <select id="edit_payment_method_status" name="payment_method_status" class="form-control">
                                <option selected disabled hidden>Select</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                            <span class="help-block" id="payment_method_edit" style="color:red;"></span>

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
<script type="text/javascript" src="{{asset('ajax/payment_method.js')}}"></script>
@endsection
