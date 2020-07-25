<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use Validator;
use App\Http\Requests\VehicleRequest;

use Illuminate\Http\Response;



class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Vehicle.vehicle');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $page = $request->input('page', 1);
        $data['sl'] = (($page - 1) * 10) + 1;
        $data['search'] = $search = $request->search;
        $data['vehicle_data'] = Vehicle::Search($request->search)->paginate(10);
        return view('admin.Vehicle.list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {

        $vehicle_model = new Vehicle;
        $vehicle_model->fill($request->all())->save();
        $response = [
            "status" => Response::HTTP_CREATED,
            "data" => $vehicle_model
        ];
        return response()->json($response , Response::HTTP_CREATED);
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
        if($vehicle_model->vehicle_status == 1):
            $vehicle_model->update(["vehicle_status" => 0]);
            $status = Response::HTTP_ACCEPTED;
        else:
            $vehicle_model->update(["vehicle_status" => 1]);
            $status = Response::HTTP_OK;
        endif;
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
        return response()->json($vehicle_edit , Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {
        $vehicle_model = Vehicle::findOrFail($id);
        $vehicle_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $vehicle_model
        ];
        return response()->json($response , 200);
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
