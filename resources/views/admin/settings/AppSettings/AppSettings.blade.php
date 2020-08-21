@extends('admin.layouts.backend_main')
@section('title') App Settings | Park Any where @endsection
@section('main_content')
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-18">App Settings</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">App Settings</li>
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
                                <form action="{{route('appsettings.update',$app_data->appsettings_id)}}"  method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    
                                <div class="form-group">
                                    <label for="application_logo">Application Logo</label>
                                    <input id="application_logo" class="form-control" name="application_logo" type="file" onchange="readURL(this);" >
                                </div>
                                <span class="help-block" style="color:red;">{{$errors->first('application_logo')}}</span>
                                <div class="form-group">
                                    <label for="application_name">Application Name</label>
                                    <input id="application_name" class="form-control" name="application_name" type="text" value="{{$app_data->application_name}}" placeholder="Application Name" >
                                    <span class="help-block" style="color:red;">{{$errors->first('application_name')}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail111">About Application</label>
                                    <textarea  class="form-control"  id="about" name="about" placeholder="About Application">{{$app_data->about}}</textarea>
                                </div>
                                <span class="help-block" style="color:red;">{{$errors->first('about')}}</span>
                                <div class="form-group">
                                    <label for="application_email">Application Email</label>
                                    <input id="application_email" class="form-control" name="application_email" type="text" value="{{$app_data->application_email}}" placeholder="Enter Email" >
                                    <span class="help-block" style="color:red;"></span>
                                </div>
                                <div class="form-group">
                                    <label for="application_phone">Phone</label>
                                    <input id="application_phone" class="form-control" name="application_phone" type="text" value="{{$app_data->application_phone}}" placeholder="Enter Phone Number" >
                                    <span class="help-block" style="color:red;">{{$errors->first('application_phone')}}</span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail111">Address</label>
                                    <textarea  class="form-control"  id="application_address" name="application_address" placeholder="Type Address">{{$app_data->application_address}}</textarea>
                                </div>
                                <span class="help-block" style="color:red;">{{$errors->first('application_address')}}</span>

                                <div class="form-group">
                                    <label for="inputCity" class="col-form-label">Vat</label>
                                    <div class="input-group">
                                        <input id="vat" name="vat" type="number" class="form-control" placeholder="Vat" value="{{$app_data->vat}}" aria-label="Amount (to the nearest dollar)" >
                                        <div class="input-group-append">

                                        </div>
                                        <span class="input-group-text">%</span>
                                    </div>
                                    <span class="help-block"  style="color:red;">{{$errors->first('vat')}}</span>
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
                                <img id='previmage' src="{{$app_data->application_logo==''? '/images/app_setting/blank_avatar.png' : '/'.$app_data->application_logo}}" alt="your image" class='img-responsive img-circle'>
                            </div>


                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->


            </div>


        </div>

@endsection
@section('script')
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
                    .width(500)
                    .height(300);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function myFunction() {
        window.print();
    }
</script>
@endsection