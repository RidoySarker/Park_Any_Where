<?php

namespace App\Http\Controllers;

use App\AppSettings;
use Illuminate\Http\Request;
use App\Http\Requests\AppSettingsRequest;
use Redirect;
use Arr;
use File;

class AppSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app_data = AppSettings::first();
        return view('admin.settings.AppSettings.AppSettings', ['app_data' => $app_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppSettingsRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\AppSettings $appSettings
     * @return \Illuminate\Http\Response
     */
    public function show(AppSettings $appSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\AppSettings $appSettings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\AppSettings $appSettings
     * @return \Illuminate\Http\Response
     */
    public function update(AppSettingsRequest $request, $id)
    {
        $appSettings_model = AppSettings::findOrFail($id);
        $requested_data = $request->all();
        if ($request->hasFile('application_logo')) {
            if (File::exists($appSettings_model->application_logo)) {
                File::delete($appSettings_model->application_logo);
            }
            $image_type = $request->file('application_logo')->getClientOriginalExtension();
            $path = "images/app_setting";
            $name = 'app_' . time() . "." . $image_type;
            $image = $request->file('application_logo')->move($path, $name);
            $requested_data = Arr::set($requested_data, 'application_logo', $image);

        }
        $appSettings_model->fill($requested_data)->save();
        return redirect()->back()->with('success', 'App Setting Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AppSettings $appSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
