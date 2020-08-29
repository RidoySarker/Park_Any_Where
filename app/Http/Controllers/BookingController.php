<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\ParkingZone;
use App\ParkingSpace;
use App\PriceVechileInfo;
use App\ParkingPrice;
use App\paymentMethod;
use App\UserVehicle;
use Auth;
use App\AppSettings;
use App\InvoiceBaseInfo;
use App\InvoicePaymentInfo;
use Arr;
use Carbon\Carbon;
use Validator;
use Redirect;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function booking_list()
    {
        $booking_data = Booking::with('parkingname', 'parkingspace', 'invoiceInfo')->get();
        return view('admin.Booking.booking_list', ['booking_data' => $booking_data]);
    }


    public function activebooking()
    {
        $booking_data = Booking::active()->with('parkingname', 'parkingspace', 'invoiceInfo')->get();
        return view('admin.Booking.active_booking', ['booking_data' => $booking_data]);
    }

    public function todaybooking()
    {
        $booking_data = Booking::active()->whereDate('created_at', Carbon::today())->with('parkingname', 'parkingspace', 'invoiceInfo')->get();
        return view('admin.Booking.today_booking', ['booking_data' => $booking_data]);
    }


    public function booking(Request $request)
    {


        $parking_space = ParkingSpace::active()->where('parking_name', $request->parking_name)->get();
        $period_data = explode(',', $request->vehicle_period);
        $vat = AppSettings::select('vat')->first();
        $vehicleperiod = PriceVechileInfo::where('price_vechile_info_id', $period_data['0'])->first();


        if ($period_data['1'] == $vehicleperiod->vehicle_period = "minute") {
            $time = Carbon::create($request->arrival_time);
            $release_time = $time->addMinute($request->time)->toDateTimeString();
        }

        if ($period_data['1'] == $vehicleperiod->vehicle_period = "hour") {
            $time = Carbon::create($request->arrival_time);
            $release_time = $time->addHour($request->time)->toDateTimeString();

        }

        if ($period_data['1'] == $vehicleperiod->vehicle_period = "day") {
            $time = Carbon::create($request->arrival_time);
            $release_time = $time->addDay($request->time)->toDateTimeString();

        }

        if ($period_data['1'] == $vehicleperiod->vehicle_period = "week") {
            $time = Carbon::create($request->arrival_time);
            $release_time = $time->addWeek($request->time)->toDateTimeString();

        }

        if ($period_data['1'] == $vehicleperiod->vehicle_period = "month") {
            $time = Carbon::create($request->arrival_time);
            $release_time = $time->addMonth($request->time)->toDateTimeString();

        }

        if ($period_data['1'] == $vehicleperiod->vehicle_period = "year") {
            $time = Carbon::create($request->arrival_time);
            $release_time = $time->addYear($request->time)->toDateTimeString();

        }


        $price = $vehicleperiod->vehicle_charge * $request->time;

        $data = [
            'price' => $price,
            'vat' => $price * $vat->vat / 100,
            'release_time' => $release_time,
            'parking_space' => $parking_space
        ];

        return response()->json($data, 200);
    }


    public function vehicleperiod($id, $parking_name)
    {
        $vehicleperiod = PriceVechileInfo::where('vehicle_type', $id)->where('parking_name', $parking_name)->groupBy('vehicle_period')->get();

        return response()->json($vehicleperiod, 200);
    }


    public function vehicleprice(Request $request, $id)
    {
        $vehicleperiod = PriceVechileInfo::where('vehicle_charge', $id)->first();

        return response()->json($vehicleperiod, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Confiramation($id)
    {
        return view('frontend.Booking.confiramation', ['invoice_code' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $booking_model = new Booking;
        $validation = Validator::make($request->all(), $booking_model->validation(), $booking_model->messages());
        if ($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];

        } else {
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            $invoicebaseinfo_model = new InvoiceBaseInfo;
            $invoicebaseinfo_model->invoice_code = time();
            $invoicebaseinfo_model->invoice_date = date('Y-m-d');
            $invoicebaseinfo_model->customer_id = $user_id;
            $invoicebaseinfo_model->save();


            $booking_model->invoice_base_info_id = $invoicebaseinfo_model->invoice_base_info_id;
            $booking_model->parking_name = $request->parking_name;
            $booking_model->vehicle_type = $request->vehicle_type;
            $booking_model->parking_space = $request->parking_space;
            $booking_model->customer_id = $user_id;
            $booking_model->invoice_total = $request->invoice_total;
            $booking_model->invoice_vat = $request->invoice_vat;
            $booking_model->invoice_discount = $request->invoice_discount;
            $booking_model->invoice_sub_total = $request->invoice_sub_total;
            $booking_model->vehicle_licence = $request->vehicle_licence;
            $booking_model->vehicle_time = $request->vehicle_time;
            $booking_model->arrival_time = $request->arrival_time;
            $booking_model->release_time = $request->release_time;
            $booking_model->save();

            $parking_space_update = ParkingSpace::where('parking_space_id', $request->parking_space)->first();

            $parking_space_update->update(["booking_status" => 1]);


            $invoicepaymentinfo_model = new InvoicePaymentInfo;
            $invoicepaymentinfo_model->invoice_base_info_id = $invoicebaseinfo_model->invoice_base_info_id;
            $invoicepaymentinfo_model->booking_id = $booking_model->booking_id;
            $invoicepaymentinfo_model->customer_id = $user_id;
            $invoicepaymentinfo_model->invoice_total = $request->invoice_total;
            $invoicepaymentinfo_model->invoice_vat = $request->invoice_vat;
            $invoicepaymentinfo_model->invoice_discount = $request->invoice_discount;
            $invoicepaymentinfo_model->invoice_sub_total = $request->invoice_sub_total;
            $invoicepaymentinfo_model->pay_amount = $request->pay_amount;
            $invoicepaymentinfo_model->due_amount = $request->due_amount;
            $invoicepaymentinfo_model->invoice_payment_method = $request->invoice_payment_method;
            $invoicepaymentinfo_model->invoice_transaction_number = $request->invoice_transaction_number;
            $invoicepaymentinfo_model->save();
            DB::commit();
            $status = 201;
            $response = [
                "status" => $status,
                "data" => $invoicebaseinfo_model,
            ];

        }

        return response()->json($response, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $data['vechicle_licence'] = UserVehicle::active()->where('user_id', $user_id)->get();
        $data['parking_zone'] = ParkingZone::where('parking_zone_id', $id)->select('parking_name')->first();
        $data['paymentMethod'] = paymentMethod::active()->get();
        $data['parking_space'] = ParkingSpace::active()->where('parking_name', $id)->get();
        $data['vechicle_data'] = PriceVechileInfo::where('parking_name', $id)->first();
        $data['vechicle'] = PriceVechileInfo::where('parking_name', $id)->groupBy('vehicle_type')->get();
        return view('frontend.Booking.booking', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    public function booking_release($id)
    {
        $bookig = Booking::where('booking_id', $id)->first();

        $bookig->update(['booking_status' => 0]);

        $data = ParkingSpace::where('parking_space_id', $bookig['parking_space'])->update(['booking_status' => 0]);

        return Redirect::back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
