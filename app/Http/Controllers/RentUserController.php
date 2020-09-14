<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationZone;
use App\ParkingZone;
use Auth;
use Hash;
use Validator;
use App\User;
use App\Http\Requests\CustomerRequest;

class RentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $parkingzone_data = ParkingZone::where('created_by', $user_id)->orderBy('parking_zone_id', 'desc')->get();
        return view('frontend.Users.RentUser.parking_list', ['parkingzone_data' => $parkingzone_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location_zone = LocationZone::Active()->get();
        return view('frontend.Users.RentUser.rentuser_parking_zone', ['location_zone' => $location_zone]);
    }

    public function rent_login()
    {
        return view('auth.RentCustomer.login');
    }


    public function rent_register()
    {
        if (Auth::check()) :
            return Redirect::to('/');
        endif;
        return view('auth.RentCustomer.rent_customer');
    }


    public function RentLogin(Request $request)
    {

        $login_data = $request->only('email', 'password');
        $user_model = new User;
        $validation = Validator::make($login_data, $user_model->loginValidation());
        if ($validation->fails()) {
            $status = 400;
            $response = [
                "status" => $status,
                "errors" => $validation->errors(),
            ];
        } else {
            $user_data = [
                'email' => $request->email,
                'password' => $request->password,
                'status' => 1,
                'user_type' => 2,
            ];

            if (Auth::attempt($user_data)) {
                $status = 200;
                $response = [
                    "status" => $status,
                    "data" => $user_data,
                ];
            }
        }

        return response()->json($response, $status);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $customer_model = new User;
        $customer_model->name = $request->name;
        $customer_model->user_type = 2;
        $customer_model->email = $request->email;
        $customer_model->number = $request->number;
        $customer_model->password = Hash::make($request->password);
        $customer_model->save();
        $response = [
            "status" => 200,
            "data" => $customer_model
        ];
        Auth::login($customer_model);

        return response()->json($response, 200);
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
