<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\ParkingZone;
use App\ParkingSpace;
use App\PriceVechileInfo;
use App\ParkingPrice;
use App\paymentMethod;
use App\LocationZone;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        // dd($request->search);
        $parkingzone = ParkingZone::active()->where(function ($parkingzone) use ($request) {
            if ($request->search) {
                $parkingzone->where('location_zone_name', $request->search);
            }

        })->paginate(8);
        $zone_location = LocationZone::active()->select('location_zone_id', 'location_zone_name')->get();
        $parkingzone_data = ParkingZone::active()->select('parking_name as title', 'latitude as lat', 'longitude as lng')->get();
        //return response()->json($parkingzone_data);
        return view('frontend.home', ['parkingzone' => $parkingzone, 'parkingzone_data' => $parkingzone_data, 'zone_location' => $zone_location]);
    }


    public function pricelist($id)
    {
        $price_data = PriceVechileInfo::where('parking_name', $id)->with('vehicletype')->get();

        return response()->json($price_data, 200);
    }

    public function periodprice($id)
    {
        $periodprice = PriceVechileInfo::where('price_vechile_info_id', $id)->first();
        return response()->json($periodprice, 200);
    }


    public function verifyemail($token = null)
    {
        // $user = User::where('email_verification_token', $token)->first();
        // return $user;
        // if ($user) {
        //     if ($user->email_verified  == 0) {
        //         $user->email_verified  == 1;
        //         $user->save();
        //         return redirect('/');
        //     } elseif($user->email_verified  == 1) {
        //         echo "Your Email is alrady Verified";
        //     } else {
        //         return view('errors.404');
        //     }

        // } else {
        //     return view('errors.404');
        // }

        if ($token == null) {

            session()->flash('message', 'Invalid Token.');
            session()->flash('type', 'danger');

            return redirect()->route('login');
        }

        $user = User::where('email_verification_token', $token)->first();

        if ($user == null) {

            session()->flash('message', 'Invalid Token.');
            session()->flash('type', 'danger');

            return redirect()->route('login');
        }

        $user->update([
            'email_verified' => 1,
            'email_verified_at' => Carbon::now(),
            'email_verification_token' => '',
        ]);

        session()->flash('type', 'success');
        session()->flash('message', 'Your Account is Activated, You Can Login Now!!');

        return redirect()->route('login');

    }


    public function park($id)
    {
        dd($id);

        return;
    }
}
