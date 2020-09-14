<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Validator;
use App\User;
use Auth;
use App\Http\Requests\CustomerRequest;
use Redirect;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.Customer.customer_register');
    }

    public function loginpage()
    {
        return view('auth.Customer.customer_login');
    }


    public function login(Request $request)
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
                'user_type' => 3,
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
    public function store(CustomerRequest $request)
    {
        $customer_model = new User;
        $customer_model->name = $request->name;
        $customer_model->user_type = 3;
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
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
