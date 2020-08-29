@extends('frontend.layouts.frontend_main')
@section('title') Park AnyWhere @endsection
@section('css')

@endsection
@section('content')
    <br>
    <div class="main-content">
        <!-- Basic Form area Start -->
        <div class="container-fluid">
            <!-- Form row -->
            <div class="row">
                <div class="col-xl-12 box-margin height-card">
                    <div class="card card-body">
                        <h4 class="card-title">{{$parking_zone->parking_name}}</h4>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form id="booking" method="POST">
                                    @csrf

                                    <div class="row">
                                        <input type="text" id="parking_name" name="parking_name" name="parking_name"
                                               value="{{$vechicle_data->parking_name}}" hidden>
                                        <div class="col-xs-6 col-md-4">
                                            <label>Vehicle Type *</label>
                                            <div class="form-group">

                                                <select class="form-control js-example-basic-single" id="vehicle_type"
                                                        name="vehicle_type">
                                                    <option selected disabled>Select</option>
                                                    @foreach($vechicle as $value)
                                                        <option
                                                            value="{{$value->vehicle_type}}">{{$value->vehicletype->vehicle_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="help-block" id="vehicle_type_error" style="color:red;"></span>
                                            <br>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label>Time *</label>
                                                    <div class="form-group">

                                                        <input class="form-control" type="number" min="1" step="1" id="time" name="vehicle_time"
                                                               placeholder="Time">
                                                    </div>
                                                    <span class="help-block" id="vehicle_time_error" style="color:red;"></span>

                                                </div>
                                                

                                                <div class="col-md-6">
                                                    <label>Vehicle Period *</label>
                                                    <div class="form-group">

                                                        <select
                                                            class="form-control js-example-basic-single vehicle_period"
                                                            id="vehicle_period" name="vehicle_period">
                                                            <option selected disabled>Select</option>
                                                        </select>
                                                    </div>
                                                    <span class="help-block" id="vehicle_period_error" style="color:red;"></span>

                                                </div>
                                                
                                            </div>
                                            <br>
                                            <label>Arrival Time *</label>
                                            <div class="form-group">

                                                <input type="text" class="form-control datetimepicker vehicle_period"
                                                       name="arrival_time" value="{{ date('Y-m-d H:i') }}">
                                            </div>

                                            <span class="help-block" id="arrival_time_error" style="color:red;"></span>
                                            <label>Select Space *</label>
                                            <div class="form-group" id="space">

                                            </div>
                                             <span class="help-block" id="parking_space_error" style="color:red;"></span>


                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <label>Vehicle Licence *</label>
                                            <div class="form-group">
                                                <select class="form-control js-example-basic-single"
                                                        id="vehicle_licence" name="vehicle_licence">
                                                    <option selected disabled>Select Licence</option>
                                                    @foreach($vechicle_licence as $value)
                                                        <option
                                                            value="{{$value->licence_no}}">{{$value->licence_no}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <span class="help-block" id="vehicle_licence_error" style="color:red;"></span>

                                            <label>Release Time *</label>
                                            <div class="form-group">

                                                <input type="text" class="form-control"
                                                       name="release_time" id="release_time" readonly>
                                            </div>


                                        </div>
                                        <div class="col-xs-6 col-md-4">
                                            <label>Price </label>
                                            <input type="text" class="" id="price" name="invoice_total"  readonly>
                                            <hr>
                                            <label>Vat = {{$appsettings->vat}}% of Price</label>
                                            <input type="text" class="" id="vat" name="invoice_vat"
                                                   readonly>
                                            <hr>
                                            <label>Total Price </label>
                                            <input type="text" class="" id="total_price" name="invoice_sub_total"
                                                   readonly>
                                            <hr>

                                            <label>Pay Ammount </label>
                                            <input type="text" class="" id="pay_amount" name="pay_amount" >
                                            <hr>

                                            <label>Payment Method *</label>
                                            <div class="form-group">
                                                <select class="form-control js-example-basic-single" id="paymentMethod"
                                                        name="invoice_payment_method">
                                                    <option selected disabled>Select Payment Method</option>
                                                    @foreach ($paymentMethod as $value)
                                                        <option
                                                            value="{{$value->payment_method_id}}">{{$value->payment_method_name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <span class="help-block" id="invoice_payment_method_error" style="color:red;"></span>
                                            <input type="text" class="" id="trxid" name="invoice_transaction_number"
                                                   placeholder="trxid">
                                            <span class="help-block" id="invoice_transaction_number_error" style="color:red;"></span>
                                            <hr>


                                            <button type="submit" class="btn btn-success">Book Now</button>
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


        </div>


@endsection

@section('js')


<script type="text/javascript">
    $(document).ready(function () {
         $('.js-example-basic-single').select2();
         });
</script>

<script type="text/javascript" src="{{asset('ajax/booking.js')}}"></script>


@endsection
