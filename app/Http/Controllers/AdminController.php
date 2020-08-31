<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Booking;
use Redirect;
use Carbon\Carbon;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['adminLogin']);
    // }

    public function index()
    {
        if (!Auth::check()) :
            return Redirect::to('/admin/login');
        endif;
        $data = Booking::get();
        $data['total_booking'] = collect($data)->count();
        $data['active_booking'] = collect($data)->where('booking_status', 0)->count();
        $data['release_booking'] = collect($data)->where('booking_status', 0)->count();
        $data['total_amount'] = collect($data)->sum('invoice_sub_total');
        $data['today_booking']= Booking::whereDate('created_at', Carbon::today())->count();
        return view('admin.dashboard',$data);
    }

    public function adminLogin()
    {

        return view('auth.Admin.admin_login');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
