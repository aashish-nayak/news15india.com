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
        return view('backpanel.role-permission.roles', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::get();
        return view('backpanel.role-permission.add-role', compact('permissions'));
    }

    public function store(Request $request)
    {
        if($request->has('id')){
            $role = Role::find($request->id);
            $request->session()->flash('success', 'Role Updated successfully!');
        }else{
            $role = new Role();
            $request->session()->flash('success', 'Role Saved successfully!');
        }
        $role->name = $request->name;
        $role->slug = $request->name;
        $role->save();
        $role->permissions()->sync($request->permissions);
        return redirect()->route('admin.role.show');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        return view('backpanel.role-permission.add-role',compact('role','permissions'));
    }

    public function destroy($id)
    {
        $data = Role::find($id);
        $data->delete();
        session()->flash('success', 'Role Deleted successfully!');
        return redirect()->back();
    }
}
