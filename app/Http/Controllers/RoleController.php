<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::latest()->get();
        return view('admin.rolespermissions.roles', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('admin.rolespermissions.add-role', compact('permissions'));
    }

    public function store(Request $request)
    {
        if($request->has('id')){
            $role = Role::find($request->id);
        }else{
            $role = new Role();
        }
        $role->name = $request->name;
        $role->slug = $request->slug;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.role.show');
    }

    public function edit($id)
    {
        $data = Role::find($id);
        $permissions = Permission::get();
        return view('admin.rolespermissions.add-role',compact('data','permissions'));
    }

    public function destroy($id)
    {
        $data = Role::find($id);
        $data->delete();
        return redirect()->back();
    }
}
