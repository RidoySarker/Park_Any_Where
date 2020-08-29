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
<div style="background-color:   #6B0EEC;
                width: 700px;
                padding: 50px;
                margin-left: 23%;
                text-align: center;
                color: #ffff">
                    <center> <img src="/images/confirme.png" style="width: 20%;"></center><br>
                    Your Booked Has Been Confirmed Your Invoice ID <br>
                     <button class="btn btn-info">#{{$invoice_code}}</button>
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
