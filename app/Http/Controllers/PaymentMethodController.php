<?php

namespace App\Http\Controllers;

use App\paymentMethod;
use Illuminate\Http\Request;
use Validator;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $paymentmethods = paymentMethod::all();
        return view('admin.settings.payment.payment');
        // ->with('paymentmethods', $paymentmethods);
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
    public function store(Request $request)
    {

        $packages_model = new paymentMethod;
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
     * @param  \App\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(paymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paymentMethod_edit = paymentMethod::findOrFail($id);
        return response()->json($paymentMethod_edit, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $packages_model = paymentMethod::findOrFail($request->edit_payment_method_id);
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
     * @param  \App\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
