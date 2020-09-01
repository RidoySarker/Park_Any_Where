<?php

namespace App\Http\Controllers;

use Auth;
use App\ParkingZone;
use App\ParkingSpace;
use App\Vehicle;
use App\Packages;
use App\Http\Requests\ParkingZoneRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Validator;
use DB;
use App\LocationZone;
use App\User;

class ParkingZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        if ($user->can('ParkingZoneList')) {
            $parkingzone_data = ParkingZone::orderBy('parking_zone_id', 'desc')->get();
            return view('admin.ParkingZone.parkingzone_list', ['parkingzone_data' => $parkingzone_data]);
        }else{
            abort(403);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(Auth::user()->id);
        if ($user->can('AddParkingZone')) {
        $location_zone = LocationZone::Active()->get();
        return view('admin.ParkingZone.create_parkingzone', ['location_zone' => $location_zone]);
        }else{
            abort(403);
        }
    }

    public function vehicle_data($id)
    {
        $vehicle_data = Vehicle::findOrFail($id);
        return response()->json($vehicle_data, 201);
    }

    public function package_data($id)
    {
        $package_data = Packages::findOrFail($id);
        return response()->json($package_data, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingZoneRequest $request)
    {
        $parking_model = new ParkingZone;
        $request_data = $request->all();
        DB::beginTransaction();
        $parking_model->fill($request_data)->save();

        $parking_space_data = explode(',', $request->parking_space);
        $data = array_pop($parking_space_data);
        $parking_space = [];
        foreach ($parking_space_data as $key => $parking_space_value) {
            $parking_space[] = [
                'parking_name' => $parking_model->parking_zone_id,
                'parking_space' => $parking_space_value,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        ParkingSpace::insert($parking_space);
        DB::commit();
        $status = 201;
        $response = [
            "status" => $status,
        ];


        return response()->json($response, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ParkingZone $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parking_model = ParkingZone::findOrFail($id);
        if ($parking_model->parking_status == 1):
            $parking_model->update(["parking_status" => 0]);
            $status = 200;
        else:
            $parking_model->update(["parking_status" => 1]);
            $status = 201;
        endif;
        return response()->json($parking_model, $status);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ParkingZone $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit_data'] = ParkingZone::where('parking_zone_id', $id)->first();
        $data['location_zone'] = LocationZone::Active()->get();
        return view('admin.ParkingZone.edit_parkingzone', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ParkingZone $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function update(ParkingZoneRequest $request, $id)
    {
        $parking_model = ParkingZone::findOrFail($id);
        $request_data = $request->all();
        DB::beginTransaction();
        $parking_model->fill($request_data)->save();
        $data = $parking_model->where('parking_limit', $request->parking_limit)->first();

        ParkingSpace::where('parking_name', $request->parking_zone_id)->delete();
        $parking_space_data = explode(',', $request->parking_space);

        $data = array_pop($parking_space_data);

        $parking_space = [];
        foreach ($parking_space_data as $key => $parking_space_value) {
            $parking_space[] = [
                'parking_name' => $parking_model->parking_zone_id,
                'parking_space' => $parking_space_value,
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        ParkingSpace::insert($parking_space);
        DB::commit();
        $status = 201;
        $response = [
            "status" => $status,
        ];


        return response()->json($response, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ParkingZone $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ParkingZone::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
