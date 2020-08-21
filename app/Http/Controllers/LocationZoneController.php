<?php

namespace App\Http\Controllers;

use App\LocationZone;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\locationZoneRequest;
use Illuminate\Http\Response;

class LocationZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.locationzone.locationzone');
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
        $data['location_zones'] = LocationZone::Search($request->search)->paginate(10);
        return view('admin.settings.locationzone.list',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(locationZoneRequest $request)
    {
        $lzone_model = new LocationZone;
        $lzone_model->fill($request->all())->save();
        $response = [
            "status" => Response::HTTP_CREATED,
            "data" => $lzone_model
        ];
        return response()->json($response , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LocationZone  $locationZone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lzone_model = LocationZone::findOrFail($id);
        if($lzone_model->location_zone_status == 1):
            $lzone_model->update(["location_zone_status" => 0]);
            $status = Response::HTTP_ACCEPTED;
        else:
            $lzone_model->update(["location_zone_status" => 1]);
            $status = Response::HTTP_OK;
        endif;
        return response()->json($lzone_model , $status);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LocationZone  $locationZone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locationzone_edit = LocationZone::findOrFail($id);
        return response()->json($locationzone_edit , Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LocationZone  $locationZone
     * @return \Illuminate\Http\Response
     */
    public function update(locationZoneRequest $request, $id)
    {
        $lzone_model = LocationZone::findOrFail($id);
        $lzone_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $lzone_model
        ];
        return response()->json($response , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LocationZone  $locationZone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LocationZone::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
