@extends('admin.layouts.backend_main')
@section('title') Profile | Park Any Where @endsection
@section('main_content')
<div class="main-content">
    <div class="data-table-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 box-margin height-card">
                <div class="card card-body">
                    <h4 class="card-title"></h4>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4 class="card-title"><b> Welcome {{Auth::user()->gender==1?'Mr.' : 'Mrs.'}} {{Auth::user()->name}}</b></h4>
                                <hr>

                                <div class="media">
                                    <a href="javascript: void(0);">
                                        @if(Auth::user()->user_img)
                                        <img class="rounded mr-75" alt="profile image" height="64" width="64">
                                        @else
                                        <img src="avatar.png" class="rounded mr-75" alt="profile image" height="64" width="64">
                                        @endif
                                    </a>
                                    <div class="media-body mt-75 ml-2">
                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="image">Upload new photo</label>
                                            <input type="file" id="image" class="image" name="image" hidden>
                                        </div>
                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG or PNG. Max size of 2048kB</small></p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}" placeholder="First Name Here">
                                </div>


                                <div class="form-group">
                                    <div class="controls">
                                        <label for="account-name">First Name</label>
                                        <input type="text" class="form-control first_name" id="first_name" name="first_name" placeholder="First Name" value="{{Auth::user()->user_first_name}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="controls">
                                        <label for="account-name">Last Name</label>
                                        <input type="text" class="form-control last_name" id="last_name" name="last_name" placeholder="Last Name" value="{{Auth::user()->user_last_name}}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="number">Number</label>
                                    <input type="text" class="form-control" id="number" name="number" placeholder="number" value="{{Auth::user()->number}}">
                                </div>

                                <div class="form-group">
                                    <div class="controls">
                                        <label for="account-name">Gender</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" name="gender" class="custom-control-input gender" id="male" value="1" @if(Auth::user()->user_gender==1) {{'checked'}} @endif>
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" name="gender" class="custom-control-input gender" id="female" value="2" @if(Auth::user()->user_gender==2){{'checked'}}@endif>
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="text" class="form-control" id="Email" name="Email" placeholder="Email" value="{{Auth::user()->email}}">
                                </div>

                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password Here">
                                    <span id="icon"></span>
                                </div>

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password Here" disabled>
                                    <span id="icon"></span>
                                </div>

                                <div class="form-group">
                                    <label for="retype_password">Retype Password</label>
                                    <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype New Password Here" disabled>
                                    <span id="re_icon"></span>
                                </div>

                                <button type="submit" id="submit" class="btn btn-primary mr-2 mt-15">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection @section('script')
    <script src="ajax/profile.js"></script>
    @endsection
