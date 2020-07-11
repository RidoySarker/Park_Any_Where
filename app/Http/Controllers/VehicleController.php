<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use Validator;
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle['data'] = Vehicle::get();
        return view('admin.Vehicle.vehicle',$vehicle);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Vehicle['data'] = Vehicle::paginate(10);
        return view('admin.Vehicle.list',$Vehicle);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $vehicle_model = new Vehicle;
        $request_data = $request->all();
        $validate = Validator::make($request_data , $vehicle_model->validation());
        if($validate->fails()){
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validate->errors()
            ];
        }else{
            $vehicle_model->fill($request_data)->save();
            $status = 200;
            $response = [
                "status" => $status,
                "data" => $vehicle_model
            ];
        }
        return response()->json($response , $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle_model = Vehicle::findOrFail($id);
        if($vehicle_model->vehicle_status == 0){
            $vehicle_model->update(["vehicle_status" => 1]);
            $status = 200;
        }else{
            $vehicle_model->update(["vehicle_status" => 0]);
            $status = 201;
        }
        return response()->json($vehicle_model , $status);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle_edit = Vehicle::findOrFail($id);
        return response()->json($vehicle_edit , 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $vehicle_model = Vehicle::findOrFail($request->vehicle_id);
        $request_data = $request->all();
        $validate = Validator::make($request_data , $vehicle_model->validation());
        if($validate->fails()){
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validate->errors()
            ];
        }else{
            $vehicle_model->fill($request_data)->save();
            $status = 200;
            $response = [
                "status" => $status,
                "data" => $vehicle_model
            ];
        }
        return response()->json($response , $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $vehicle = Vehicle::findOrFail($id)->delete();
      return response()->json($vehicle, 200);

    }
    
}
