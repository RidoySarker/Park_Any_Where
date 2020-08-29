<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Redirect;
use Arr;
use File;
use App\Booking;
use App\UserVehicle;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin.Profile.Profile');
    }

    public function myprofile()
    {
        $user_vehicle = UserVehicle::where('user_id', Auth::user()->id)->get();
        return view('frontend.Users.Customer.customer_profile', ['user_vehicle' => $user_vehicle]);
    }


    public function bookinghistory()
    {
        $booking_data = Booking::where('customer_id', Auth::user()->id)->with('parkingname', 'parkingspace', 'invoiceInfo')->get();
        return view('frontend.Users.Customer.booking_history', ['booking_data' => $booking_data]);
    }


    public function checkpass(Request $request)
    {

        $match_pass = Hash::check($request->current_password, Auth::user()->password);
        if ($match_pass) {
            echo "match";
        } else {
            echo "error";
        }
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [
                'name' => 'required',
                'user_first_name' => 'required',
                'user_last_name' => 'required',
                'user_gender' => 'required',
                'number' => 'required',
                'user_img' => 'required',
                'email' => 'required',
            ],
            [
                'name.required' => ' Name Required',
                'user_first_name.required' => 'First Name Required',
                'user_last_name.required' => 'Last Name Required',
                'user_gender.required' => 'Gender Required',
                'number.required' => 'Number Required',
                'user_img.required' => 'Image Required',
                'email.required' => 'Email  Required',
            ]
        );
        $input = [
            'name' => $request->name,
            'user_first_name' => $request->user_first_name,
            'user_last_name' => $request->user_last_name,
            'user_gender' => $request->user_gender,
            'number' => $request->number,
            'user_img' => $request->user_img,
        ];

        if ($request->password) {
            $update = [
                'name' => $request->name,
                'user_first_name' => $request->user_first_name,
                'user_last_name' => $request->user_last_name,
                'user_gender' => $request->user_gender,
                'number' => $request->number,
                'user_img' => $request->user_img,
                'password' => Hash::make($request->password),
            ];
        } else {
            $update = [
                'name' => $request->name,
                'user_first_name' => $request->user_first_name,
                'user_last_name' => $request->user_last_name,
                'user_gender' => $request->user_gender,
                'number' => $request->number,
                'user_img' => $request->user_img,
            ];
        }

        User::where('id', Auth::user()->id)->update($update);
        $response = [
            'msgType' => 'success',
            'message' => 'User updated successfully '
        ];

        echo json_encode($response);
    }


    public function show(Request $request)
    {
    }


    public function edit($id)
    {
        //
    }

    public function update(ProfileRequest $request, $id)
    {
        $user_model = User::findOrFail($id);
        $request_data = $request->all();
        if ($request->new_password) {
            $request_data = Arr::set($request_data, 'password', Hash::make($request->new_password));
        }
        if ($request->hasFile('profile_image')) {
            if (File::exists($user_model->profile_image)) {
                File::delete($user_model->profile_image);
            }
            $image_type = $request->file('profile_image')->getClientOriginalExtension();
            $path = "images/users";
            $name = 'user_' . time() . "." . $image_type;
            $image = $request->file('profile_image')->move($path, $name);
            $request_data = Arr::set($request_data, 'profile_image', $image);

        }
        $user_model->fill($request_data)->save();
        return redirect()->back()->with('success', 'Profile Update Successfully');
    }

    public function destroy($id)
    {
        //
    }
}
