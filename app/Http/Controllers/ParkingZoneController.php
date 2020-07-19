<?php

namespace App\Http\Controllers;

use App\ParkingZone;
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
        //
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
