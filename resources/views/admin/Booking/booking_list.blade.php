@extends('admin.layouts.backend_main')
@section('title') Booking List | Park Any where @endsection
@section('main_content')

    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-18">Booking</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Booking</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Booking List</h4>

                                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>

                                        <th>Invoice ID</th>
                                        <th>Parking Name</th>
                                        <th>Space</th>
                                        <th>Licence</th>
                                        <th>Vat</th>
                                        <th>Total</th>
                                        <th>Arival Time</th>
                                        <th>Release Time</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($booking_data as $key => $value)
                                        <tr>

                                            <td>#{{ $value->invoiceInfo['invoice_code'] }}</td>
                                            <td>{{$value->parkingname->parking_name}}</td>
                                            <td>{{$value->parkingspace->parking_space}}</td>
                                            <td>{{$value->vehicle_licence}}</td>
                                            <td>{{$value->invoice_vat}}</td>
                                            <td>{{$value->invoice_total}}</td>
                                            <td>{{$value->arrival_time}}</td>
                                            <td>{{$value->release_time}}</td>
                                            <td>
                                                @if ($value->booking_status == 1)
                                                    <span class="badge badge-info badge-pill">Active</span><br>

                                                    <a href="{{url('/admin/booking_release',$value->booking_id)}}"
                                                       class="badge badge-warning badge-pill">Release</a>

                                                @else
                                                    <span class="badge badge-success badge-pill">Released</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <td colspan="3"></td>
                                    <td class="text-right">Total Amount:</td>
                                    <td>{{ $vat=  collect($booking_data)->sum('invoice_vat') }}</td>
                                    <td>{{ $total = collect($booking_data)->sum('invoice_total') }}</td>
                                    <td>Sub Total:{{ $vat+ $total}}</td>
                                    <td></td>
                                    <td></td>
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



@endsection
