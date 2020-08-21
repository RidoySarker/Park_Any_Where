<?php

namespace App\Http\Controllers;

use App\paymentMethod;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\paymentMethodRequest;
use Illuminate\Http\Response;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.payment.payment');
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
        $data['paymentmethods'] = paymentMethod::Search($request->search)->paginate(10);
        return view('admin.settings.payment.list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(paymentMethodRequest $request)
    {
        $pmethod_model = new paymentMethod;
        $pmethod_model->fill($request->all())->save();
        $response = [
            "status" => Response::HTTP_CREATED,
            "data" => $pmethod_model
        ];
        return response()->json($response , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pmethod_model = paymentMethod::findOrFail($id);
        if($pmethod_model->payment_method_status == 1):
            $pmethod_model->update(["payment_method_status" => 0]);
            $status = Response::HTTP_ACCEPTED;
        else:
            $pmethod_model->update(["payment_method_status" => 1]);
            $status = Response::HTTP_OK;
        endif;
        return response()->json($pmethod_model , $status);
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
        return response()->json($paymentMethod_edit , Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(paymentMethodRequest $request, $id)
    {
        $pmethod_model = paymentMethod::findOrFail($id);
        $pmethod_model->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $pmethod_model
        ];
        return response()->json($response , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        paymentMethod::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
