@extends('admin.layouts.backend_main')
@section('title') Profile | Park Any Where @endsection
@section('main_content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        @if (Session::has('success'))
           <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
            <!-- Form row -->
            <div class="row">
                <div class="col-xl-6 box-margin height-card">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form action="{{route('profile.update',Auth::user()->id)}}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                <div class="form-group">
                                    <label for="profile_image">Profile Image</label>
                                    <input id="profile_image" class="form-control" name="profile_image" type="file" onchange="readURL(this);" >
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" class="form-control" name="name" type="text" value="{{Auth::user()->name}}" placeholder="Name" >
                                    <span class="help-block" style="color:red;">{{$errors->first('name')}}</span>
                                </div>
                                <span class="help-block" style="color:red;">{{$errors->first('about')}}</span>
                                <div class="form-group">
                                    <div class="controls">
                                        <label for="account-name">Gender</label>
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" name="gender" class="custom-control-input gender" id="male" value="1" @if(Auth::user()->gender==1) {{'checked'}} @endif>
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" name="gender" class="custom-control-input gender" id="female" value="2" @if(Auth::user()->gender==2){{'checked'}}@endif>
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                        <span class="help-block" style="color:red;">{{$errors->first('gender')}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" name="email" type="text" value="{{Auth::user()->email}}" placeholder="Enter Email" >
                                    <span class="help-block" style="color:red;">{{$errors->first('email')}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="number">Phone</label>
                                    <input id="number" class="form-control" name="number" type="text" value="{{Auth::user()->number}}" placeholder="Enter Phone Number" >
                                    <span class="help-block" style="color:red;">{{$errors->first('number')}}</span>
                                </div>

                                <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                                    <span class="icon"></span>
                                </div>

                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" disabled>
                                    <span id="icon"></span>
                                </div>

                                <div class="form-group">
                                    <label for="retype_password">Retype Password</label>
                                    <input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype New Password" disabled>
                                    <span class="retype_icon"></span>
                                </div>

                                    <button type="submit" class="submit btn btn-primary mr-2 mt-15">Update</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 box-margin height-card">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <img id='previmage' src="{{ Auth::user()->profile_image ==''? '/images/app_setting/blank_avatar.png' : '/'.Auth::user()->profile_image }}" alt="your image" class='img-responsive img-circle'>
                            </div>


                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->


            </div>


        </div>

@endsection
@section('script')
<script src="{{url('ajax/profile.js')}}"></script>


<script type="text/javascript">
    $("#email").click(function() {
        $("#email").prop("readonly", true);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previmage')
                    .attr('src', e.target.result)

            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function myFunction() {
        window.print();
    }
</script>
@endsection
