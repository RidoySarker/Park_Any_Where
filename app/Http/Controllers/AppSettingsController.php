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
    public function store(AppSettingsRequest $request)
    {
        //
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
    public function edit(AppSettings $appSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppSettings $appSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppSettings  $appSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppSettings $appSettings)
    {
        //
    }
}
