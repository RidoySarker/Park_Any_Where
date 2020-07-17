<?php

namespace App\Http\Controllers;

use App\Packages;
use App\Vehicle;
use Validator;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle['data'] = Vehicle::get();
        return view('admin.Package.package', $vehicle);
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
        $data['package_data'] = Packages::when($search, function ($query) use ($search) {
            $query->where('package_name', 'like', "%$search%")
                ->orwhere('vehicle_type', 'like', "%$search%")
                ->orwhere('package_time', 'like', "%$search%")
                ->orwhere('package_period', 'like', "%$search%")
                ->orwhere('package_charge', 'like', "%$search%")
                ->orwhere('package_note', 'like', "%$search%")
                ->orwhere('package_status', 'like', "%$search%");
        })->with('vehicleType')->paginate(10);
        return view('admin.Package.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $packages_model = new Packages;
        $request_data = $request->all();
        $validate = Validator::make($request_data, $packages_model->validation(), $packages_model->message());
        if ($validate->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validate->errors()
            ];
        } else {

            $packages_model->fill($request_data)->save();
            $status = 200;
            $response = [
                "status" => $status,
                "data" => $packages_model
            ];
        }
        return response()->json($response, $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $packages_model = Packages::findOrFail($id);
        if ($packages_model->package_status == 1) :
            $packages_model->update(["package_status" => 0]);
            $status = 201;
        else :
            $packages_model->update(["package_status" => 1]);
            $status = 200;
        endif;
        return response()->json($packages_model, $status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle['data'] = Vehicle::get();
        $package_edit = Packages::findOrFail($id);
        return response()->json($package_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $packages_model = Packages::findOrFail($request->package_id);
        $request_data = $request->all();
        $validate = Validator::make($request_data, $packages_model->validation(), $packages_model->message());
        if ($validate->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validate->errors()
            ];
        } else {
            $packages_model->fill($request_data)->save();
            $status = 200;
            $response = [
                "status" => $status,
                "data" => $packages_model
            ];
        }
        return response()->json($response, $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package = Packages::findOrFail($id)->delete();
        return response()->json($package, 200);
    }
}
