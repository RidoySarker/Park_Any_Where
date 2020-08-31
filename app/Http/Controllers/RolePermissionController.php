<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\RolePermission;
use App\User;
use Auth;
class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.RBAC.RolePermission.rolepermission');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $role_data = Role::where(function ($role_data) use ($request) {
            if ($request->search) {
                $role_data->where('name', 'LIKE', '%' . $request->search . '%');
            }
        })->with('permissions')->paginate(10);
        $permission = Permission::get();
        return view('admin.RBAC.RolePermission.rolepermission_list', ['role_data' => $role_data, 'permission' => $permission]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['role_permissions'] = Role::with('permissions')->whereId($id)->get();
        $data['permissions'] = Permission::all();
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        RolePermission::where("role_id", $id)->delete();
        foreach ($request->permission_id as $key => $value) {
            $data[] = [
                "permission_id" => $request->permission_id[$key],
                "role_id" => $id,
            ];
        }
        RolePermission::insert($data);
        // $user=User::find(Auth::user()->id);
        // $permission_name=Role::find($id);
        // $user->syncRoles([$permission_name->name]);
        return response()->json(null, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
