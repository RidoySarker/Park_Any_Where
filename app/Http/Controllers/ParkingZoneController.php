<?php

namespace App\Http\Controllers;
Use Auth;
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
class ParkingZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['parkingzone_data'] = ParkingZone::with('vehicleType','PackageVehicle.vehicleType')->get();

        return view('admin.ParkingZone.parkingzone_list',$data);
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
        return view('admin.ParkingZone.create_parkingzone', $data);
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
    public function store(Request $request)
    {
        $parking_model = new ParkingZone;
        $request_data = $request->all();
        $validate = $parking_model->validation();
        if ($request->parking_type == 1) {
            $validate = Arr::add($validate, "package_name","required");
            $validate = Arr::add($validate, "parking_charge","required");
            $validate = Arr::add($validate, "parking_time","required");
            $validate = Arr::add($validate, "parking_period","required");

        } else if ($request->parking_type == 2) {
            $validate = Arr::add($validate, "vehicle_type","required");
            $validate = Arr::add($validate, "parking_charge","required");
            $validate = Arr::add($validate, "parking_time","required");
            $validate = Arr::add($validate, "parking_period","required");
        }
        else{
            $validate = $validate;
        }
        $validateData = Validator::make($request_data,$validate);
        if ($validateData->fails()) {
            $status = 422;
            $response = [
                "status" => $status,
                "errors" => $validateData->errors()
            ];
        }else {

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
            $response = [
                "status" => Response::HTTP_CREATED,
            ];
        }

        return response()->json($response, Response::HTTP_CREATED);
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
        if($parking_model->parking_status == 1):
            $parking_model->update(["parking_status" => 0]);
            $status = Response::HTTP_ACCEPTED;
        else:
            $parking_model->update(["parking_status" => 1]);
            $status = Response::HTTP_OK;
        endif;
        return response()->json($parking_model , $status);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ParkingZone $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['edit_data'] = ParkingZone::findOrFail($id);
        $data['vehicle_data'] = Vehicle::Active()->get();
        $data['package_data'] = Packages::Active()->get();
        return view('admin.ParkingZone.edit_parkingzone', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ParkingZone $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParkingZone $parkingZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ParkingZone $parkingZone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $parkingzone = ParkingZone::findOrFail($id)->delete();
      return response()->json($parkingzone, 200);
    }
}
