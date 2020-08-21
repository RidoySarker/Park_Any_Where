<?php

namespace App\Http\Controllers;

use App\ParkingPrice;
use App\ParkingZone;
use App\PriceVechileInfo;
use App\Vehicle;
use App\Http\Requests\ParkingPriceRequest;
use Illuminate\Http\Request;
use Auth;
use Redirect;
class ParkingPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parking_zone = ParkingZone::active()->select('parking_zone_id','parking_name')->get();
        $vehicle = Vehicle::active()->get();
        return view('admin.ParkingPrice.parking_price',
            ['parking_zone' => $parking_zone, 'vehicle' => $vehicle]);
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
        $data['parking_data'] = ParkingPrice::Search($request->search)->with('parkingzone')->paginate(10);
        return view('admin.ParkingPrice.parking_price_list',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParkingPriceRequest $request)
    {
        // dd($request->all());
        $price_model = new ParkingPrice;
        $price_model->fill($request->all())->save();
        $vehicle_count = count($request->vehicle_type);
        for ($i=0; $i <$vehicle_count ; $i++) { 
            $store[] =[
                'parking_name' =>$request->parking_name,
                'parking_price_id' =>$price_model->parking_price_id,
                'vehicle_type' =>$request->vehicle_type[$i],
                'vehicle_charge' =>$request->vehicle_charge[$i],
                'vehicle_time' =>$request->vehicle_time[$i],
                'vehicle_period' =>$request->vehicle_period[$i],
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ];
        }
        PriceVechileInfo::insert($store);
        $status = 201;
        $response = [
            "status" => $status,
        ];
        return response()->json($response , $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ParkingPrice  $parkingPrice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price_model = ParkingPrice::findOrFail($id);
        if ($price_model->price_status == 1):
            $price_model->update(["price_status" => 0]);
            $status = 200;
        else:
            $price_model->update(["price_status" => 1]);
            $status = 201;
        endif;
        return response()->json($price_model, $status);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ParkingPrice  $parkingPrice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['parking_zone'] = ParkingZone::active()->select('parking_zone_id','parking_name')->get();
        $data['vehicle'] = Vehicle::active()->get();
        $data['parking_price'] = ParkingPrice::where('parking_price_id', $id)->with('vehicleprice')->first();
        return view('admin.ParkingPrice.edit_parking_price',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ParkingPrice  $parkingPrice
     * @return \Illuminate\Http\Response
     */
    public function update(ParkingPriceRequest $request, $id)
    {
        $price_model = ParkingPrice::findOrFail($id);
        $request_data = $request->all();
        $price_model->fill($request_data)->save();
        PriceVechileInfo::where('parking_name' ,$request->parking_name)->delete();
        $vehicle_count = count($request->vehicle_type);
        for ($i=0; $i <$vehicle_count ; $i++) { 
            $store[] =[
                'parking_name' =>$request->parking_name,
                'parking_price_id' =>$price_model->parking_price_id,
                'vehicle_type' =>$request->vehicle_type[$i],
                'vehicle_charge' =>$request->vehicle_charge[$i],
                'vehicle_time' =>$request->vehicle_time[$i],
                'vehicle_period' =>$request->vehicle_period[$i],
                'created_by' => Auth::user()->id,
                'updated_by' => Auth::user()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ];
        }
        PriceVechileInfo::insert($store);
        return redirect()->back()->with('success', 'Parking Price Update Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ParkingPrice  $parkingPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ParkingPrice::findOrFail($id)->delete();
      return response()->json(null, 200);

    }

}
