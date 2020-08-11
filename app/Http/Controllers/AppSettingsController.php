<?php

namespace App\Http\Controllers;

use App\AppSettings;
use Illuminate\Http\Request;
use App\Http\Requests\AppSettingsRequest;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.AppSettings.AppSettings');
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
        $data['appsettings_data'] = AppSettings::paginate(10);
        return view('admin.settings.AppSettings.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppSettingsRequest $request)
    {
        $appSettings_model = new AppSettings;
        $appSettings_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $appSettings_model
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function show(AppSettings $appSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appSettings_edit = AppSettings::findOrFail($id);
        return response()->json($appSettings_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function update(AppSettings $request,  $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appSettings = AppSettings::findOrFail($id)->delete();
        return response()->json($appSettings, 200);
    }
}
