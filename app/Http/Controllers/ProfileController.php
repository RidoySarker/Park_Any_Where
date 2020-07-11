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
        return view('admin.Profile.profile');
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name'     => 'required',
                'contact'  => 'required',
                'gender'   => 'required'
            ],
            [
                'name.required'     => 'Name Type Required',
                'contact.required'  => 'Contact Required',
                'gender.required'   => 'Gender Period Required',
            ]
        );
        $input = [
            'name'      => $request->name,
            'contact'   => $request->contact,
            'gender'    => $request->gender
        ];

        if ($request->password) {
            $update = [
                'name'      => $request->name,
                'contact'   => $request->contact,
                'gender'    => $request->gender,
                'password'  => Hash::make($request->password),
            ];
        } else {
            $update = [
                'name'      => $request->name,
                'contact'   => $request->contact,
                'gender'    => $request->gender
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
