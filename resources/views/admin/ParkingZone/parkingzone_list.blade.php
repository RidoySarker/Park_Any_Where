@extends('admin.layouts.backend_main')
@section('title') Parking Zone List | Park Any where @endsection
@section('main_content')

    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-18">Dashboard</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Parking Zone</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Parking Zone List</h4>


                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Parking Name</th>
                                        <th>Latitude</th>
                                        <th>Longitude</th>
                                        <th>Limit</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($parkingzone_data as $key => $value)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$value->parking_name}}</td>
                                            <td>{{$value->latitude}}</td>
                                            <td>{{$value->longitude}}</td>
                                            <td>{{$value->parking_limit}}</td>
                                            <td >
                                                @if($value->parking_status==1)
                                                    <span class="text-success">Active</span>
                                                    @else
                                                    <span class="text-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @can('ParkingZoneStatus')
                                                    @if ($value->parking_status == 1)
                                                        <button type="submit"
                                                                class="btn btn-rounded btn-outline-success mb-2 mr-2"
                                                                id="parking_status" data="{{$value->parking_zone_id}}"><i
                                                                class="fa fa-refresh" aria-hidden="true"></i></button>
                                                    @else
                                                    <button type="submit"
                                                            class="btn btn-rounded btn-outline-danger mb-2 mr-2"
                                                            id="parking_status" data="{{$value->parking_zone_id}}"><i
                                                            class="fa fa-refresh" aria-hidden="true"></i></button>
                                                    @endif
                                                @endcan
                                                @can('ParkingZoneEdit')
                                                    <a href="{{route('parkingzone.edit',$value->parking_zone_id)}}"
                                                   class="btn btn-rounded btn-outline-info mb-2 mr-2">Edit</a>
                                                @endcan
                                                @can('ParkingZoneDelete')
                                                    <button type="submit"
                                                            class="btn btn-rounded btn-outline-danger mb-2 mr-2 delete"
                                                            data="{{ $value->parking_zone_id }}">Delete
                                                    </button>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->


            </div>
        </div>


    </div>

@endsection

@section('script')

    <script type="text/javascript" src="{{asset('ajax/parkingzone.js')}}"></script>

@endsection
