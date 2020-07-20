<?php

namespace App\Http\Controllers;

use App\ParkingZone;
use App\Vehicle;
use App\Packages;
use Illuminate\Http\Request;

class ParkingZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ParkingZone.parkingzone_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['vehicle_data'] = Vehicle::Active()->get();
        $data['package_data'] = Packages::Active()->get();
        return view('admin.ParkingZone.create_parkingzone',$data);
    }

    public function vehicle_data($id)
    {
        $vehicle_data = Vehicle::findOrFail($id);
        return response()->json($vehicle_data , 201);
    }

    public function package_data($id)
    {
        $package_data = Packages::findOrFail($id);
        return response()->json($package_data , 201);
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
     * @param  \App\ParkingZone  $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function show(ParkingZone $parkingZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParkingZone  $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function edit(ParkingZone $parkingZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParkingZone  $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParkingZone $parkingZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParkingZone  $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkingZone $parkingZone)
    {
        //
    }
}
