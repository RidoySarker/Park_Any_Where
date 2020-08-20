<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use App\ParkingZone;
use App\ParkingSpace;
use App\PriceVechileInfo;
use App\ParkingPrice;
use App\paymentMethod;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }



    public function vehicleperiod($id)
    {
        $vehicleperiod = PriceVechileInfo::where('vehicle_type' ,$id)->groupBy('vehicle_period')->get();

        return response()->json($vehicleperiod, 200);
    }


    public function vehicleprice(Request $request, $id, $booking_id)
    {
        $vehicleperiod = PriceVechileInfo::where('vehicle_charge' ,$id)->where('parking_name',$booking_id)->first();

        return response()->json($vehicleperiod, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['paymentMethod'] = paymentMethod::active()->get();
        $data['parking_space'] = ParkingSpace::active()->where('parking_name' ,$id)->get();
        $data['vechicle_data'] = PriceVechileInfo::where('parking_name' ,$id)->groupBy('vehicle_type')->first();
        $data['vechicle'] = PriceVechileInfo::where('parking_name' ,$id)->groupBy('vehicle_type')->get();
        return view('frontend.booking',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
