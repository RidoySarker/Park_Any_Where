<?php

namespace App\Http\Controllers;

use App\UserVehicle;
use Illuminate\Http\Request;
use App\Http\Requests\UserVehicleRequest;
use Redirect;
use Arr;
use File;
use Auth;
use App\Booking;

class UserVehicleController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserVehicleRequest $request)
    {
        $user_vehicle_model = new UserVehicle;
        $requested_data = $request->all();
        if ($request->hasFile('vehicle_image')) {
            if (File::exists($user_vehicle_model->vehicle_image)) {
                File::delete($user_vehicle_model->vehicle_image);
            }
            $image_type = $request->file('vehicle_image')->getClientOriginalExtension();
            $path = "images/user_vehicle";
            $name = 'user_vehicle_' . time() . "." . $image_type;
            $image = $request->file('vehicle_image')->move($path, $name);
            $requested_data = Arr::set($requested_data, 'vehicle_image', $image);

        }
        $user_vehicle_model->fill($requested_data)->save();
        return redirect()->back()->with('success', 'Vehicle Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\UserVehicle $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_vehicle = UserVehicle::findOrFail($id);
        if ($user_vehicle->v_status == 1):
            $user_vehicle->update(["v_status" => 0]);
        else:
            $user_vehicle->update(["v_status" => 1]);
        endif;
        return redirect()->back()->with('success', 'Vehicle Status Update Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\UserVehicle $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(UserVehicle $userVehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\UserVehicle $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserVehicle $userVehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\UserVehicle $userVehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserVehicle $userVehicle)
    {
        //
    }
}
