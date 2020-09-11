<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Http\Requests\AddUserRequest;
use App\User;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.RBAC.User.user');
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
        $data['user'] = User::Search($request->search)->paginate(10);
        return view('admin.RBAC.User.user_list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $add_user = new User;
        $add_user->name = $request->name;
        $add_user->user_type = 1;
        $add_user->gender = $request->gender;
        $add_user->email = $request->email;
        $add_user->number = $request->number;
        $add_user->password = Hash::make($request->password);
        $add_user->save();
        $response = [
            "status" => 200,
            "data" => $add_user
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        if ($user->status == 1):
            $user->update(["status" => 0]);
            $status = 201;
        else:
            $user->update(["status" => 1]);
            $status = 200;
        endif;
        return response()->json($user, $status);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all())->save();
        $response = [
            "status" => 200,
            "data" => $user
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 200);
    }
}
