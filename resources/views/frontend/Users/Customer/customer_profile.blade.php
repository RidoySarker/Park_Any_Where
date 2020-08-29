@extends('frontend.layouts.frontend_main')
@section('title') My Profile | Park AnyWhere @endsection
@section('css')

@endsection
@section('content')
    <br>
    <div class="main-content">
        <div class="container-fluid">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <!-- Form row -->
            <div class="row">
                <div class="col-xl-6 box-margin height-card">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form action="{{route('profile.update',Auth::user()->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <img id='previmage' style="max-width: 33%;margin-left: 64px;    border-radius: 50%;"
                                         src="{{ Auth::user()->profile_image ==''? '/images/app_setting/blank_avatar.png' : '/'.Auth::user()->profile_image }}"
                                         alt="your image" class='img-responsive img-circle'>
                                    <br>
                                    <br>
                                    <label for="profile_image">Profile Image</label>
                                    <div class="form-group">

                                        <input id="profile_image" class="form-control" name="profile_image" type="file"
                                               onchange="readURL(this);">
                                    </div>
                                    <label for="name">Name</label>
                                    <div class="form-group">

                                        <input id="name" class="form-control" name="name" type="text"
                                               value="{{Auth::user()->name}}" placeholder="Name">
                                        <span class="help-block" style="color:red;">{{$errors->first('name')}}</span>
                                    </div>
                                    <span class="help-block" style="color:red;">{{$errors->first('about')}}</span>
                                    <label for="account-name">Gender</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="d-inline-block custom-control custom-radio mr-1">
                                                <input type="radio" name="gender" class="custom-control-input gender"
                                                       id="male"
                                                       value="1" @if(Auth::user()->gender==1) {{'checked'}} @endif>
                                                <label class="custom-control-label" for="male">Male</label>
                                            </div>
                                            <div class="d-inline-block custom-control custom-radio">
                                                <input type="radio" name="gender" class="custom-control-input gender"
                                                       id="female"
                                                       value="2" @if(Auth::user()->gender==2){{'checked'}}@endif>
                                                <label class="custom-control-label" for="female">Female</label>
                                            </div>
                                        </div>
                                        <span class="help-block" style="color:red;">{{$errors->first('gender')}}</span>

                                    </div>
                                    <label for="email">Email</label>
                                    <div class="form-group">

                                        <input id="email" class="form-control" name="email" type="text"
                                               value="{{Auth::user()->email}}" placeholder="Enter Email">
                                        <span class="help-block" style="color:red;">{{$errors->first('email')}}</span>
                                    </div>
                                    <label for="number">Phone</label>
                                    <div class="form-group">

                                        <input id="number" class="form-control" name="number" type="text"
                                               value="{{Auth::user()->number}}" placeholder="Enter Phone Number">
                                        <span class="help-block" style="color:red;">{{$errors->first('number')}}</span>
                                    </div>
                                    <label for="current_password">Current Password</label>
                                    <div class="form-group">

                                        <input type="password" class="form-control" id="current_password"
                                               name="current_password" placeholder="Current Password">
                                        <span class="icon"></span>
                                    </div>
                                    <label for="new_password">New Password</label>
                                    <div class="form-group">

                                        <input type="password" class="form-control" id="new_password"
                                               name="new_password" placeholder="New Password" disabled>
                                        <span id="icon"></span>
                                    </div>
                                    <label for="retype_password">Retype Password</label>
                                    <div class="form-group">

                                        <input type="password" class="form-control" id="retype_password"
                                               name="retype_password" placeholder="Retype New Password" disabled>
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
                                <button type="button" class="btn btn-rounded btn-primary mb-2 mr-2 pull-right"
                                        data-toggle="modal" data-target="#addModal">Add Vehicle
                                </button>
                            </div>
                            <table id="datatable-buttons"
                                   class="table table-striped dt-responsive nowrap w-100 dataTable">
                                <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th class="text-center">Vehicle Image</th>
                                    <th class="text-center">Vehicle Licence</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user_vehicle as $key => $value )
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td class="text-center"><img style="width: 44%;"
                                                                     src="{{ $value->vehicle_image ==''? '/images/app_setting/blank_avatar.png' : '/'.$value->vehicle_image }}">
                                        </td>
                                        <td class="text-center"> {{$value->licence_no}} </td>
                                        <td class="text-center"> {{$value->vehicle_color}}</td>
                                        <td class="text-center">
                                            @if($value->v_status == 1)
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">Inactive</span>
                                            @endif

                                        </td>
                                        <td class="text-center">
                                            @if($value->v_status == 1)
                                                <a href="{{route('uservehicle.show',$value->user_vehicle_id)}}"
                                                   class="btn btn-rounded btn-outline-danger mb-2 mr-2">Inactive</a>

                                            @else
                                                <a href="{{route('uservehicle.show',$value->user_vehicle_id)}}"
                                                   class="btn btn-rounded btn-outline-success mb-2 mr-2">Active</a>
                                            @endif


                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->


            </div>


        </div>

        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Vehicle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="body">
                        <form action="{{route('uservehicle.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <img id='v_previmage' style="max-width: 33%;margin-left: 64px;    border-radius: 50%;"
                                 src="{{ url('/images/blank_car.png') }}" alt="your image"
                                 class='img-responsive img-circle'>
                            <br>
                            <br>
                            <label for="vehicle_image">Vehicle Image * <span style="color: red">Vehicle Image With Licence</span>
                            </label>
                            <div class="form-group">

                                <input id="vehicle_image" class="form-control" name="vehicle_image" type="file"
                                       onchange="readURL(this);">
                            </div>
                            <span class="help-block" style="color:red;">{{$errors->first('vehicle_image')}}</span>
                            <label for="licence_no">Vehicle Licence *</label>
                            <div class="form-group">
                                <input id="licence_no" class="form-control" name="licence_no" type="text"
                                       placeholder="Vehicle Licence">
                            </div>
                            <span class="help-block" style="color:red;">{{$errors->first('licence_no')}}</span>
                            <label for="email">Vehicle Color</label>
                            <div class="form-group">

                                <input id="vehicle_color" class="form-control" name="vehicle_color" type="text"
                                       placeholder="Vehicle Color">
                            </div>
                            <span class="help-block" style="color:red;">{{$errors->first('vehicle_color')}}</span>
                            <label for="number">Note</label>
                            <div class="form-group">

                                <textarea class="form-control" id="note" name="note"
                                          placeholder="Note About Vehicle"></textarea>
                            </div>
                            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                            <label for="current_password">Status</label>
                            <div class="form-group">

                                <select name="v_status" class="form-control">
                                    <option selected disabled hidden>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <span class="help-block" style="color:red;">{{$errors->first('v_status')}}</span>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-rounded btn-success mb-2 mr-2">Submit</button>
                                <button type="button" class="btn btn-rounded btn-secondary mb-2 mr-2"
                                        data-dismiss="modal">Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        @endsection

        @section('js')

            <script src="{{url('ajax/profile.js')}}"></script>

            <script type="text/javascript">
                if ("{{$errors->any()}}") {
                    $('#addModal').modal('show');
                }
            </script>

            <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
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


            <script type="text/javascript">
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#v_previmage')
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

