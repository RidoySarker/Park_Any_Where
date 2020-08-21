<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ProfileController extends Controller
{

    public function index()
    {
        return view('admin.Profile.Profile');
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate(
            [
                'name'     => 'required',
                'user_first_name'     => 'required',
                'user_last_name'     => 'required',
                'user_gender'     => 'required',
                'number'     => 'required',
                'user_img'     => 'required',
                'email'    => 'required',
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
            'name'      => $request->name,
            'user_first_name'      => $request->user_first_name,
            'user_last_name'      => $request->user_last_name,
            'user_gender'      => $request->user_gender,
            'number'      => $request->number,
            'user_img'   => $request->user_img,
        ];

        if ($request->password) {
            $update = [
                'name'      => $request->name,
                'user_first_name'      => $request->user_first_name,
                'user_last_name'      => $request->user_last_name,
                'user_gender'      => $request->user_gender,
                'number'      => $request->number,
                'user_img'   => $request->user_img,
                'password'  => Hash::make($request->password),
            ];
        } else {
            $update = [
                'name'      => $request->name,
                'user_first_name'      => $request->user_first_name,
                'user_last_name'      => $request->user_last_name,
                'user_gender'      => $request->user_gender,
                'number'      => $request->number,
                'user_img'   => $request->user_img,
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
        $match = Hash::check($request->current_password, Auth::user()->password);
        if ($match) {
            echo "matched";
        } else {
            echo "error";
        }
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
