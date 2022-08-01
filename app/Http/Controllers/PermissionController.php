<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('backpanel.role-permission.permissions', compact('permissions'));
    }

    public function create()
    {
        return view('backpanel.role-permission.permissions');
    }

    public function store(Request $request)
    {
        $save = [
            'name' => $request->name,
            'slug' => $request->name
        ];
        if($request->has('id')){
            $permission = Permission::find($request->id)->update($save);
            $request->session()->flash('success', 'Permission Updated successfully!');
        }else{
            $permission = Permission::create($save);
            $request->session()->flash('success', 'Permission Saved successfully!');
        }
        Role::where('slug','super-admin')->first()->permissions()->sync(Permission::all()->pluck('id')->toArray());
        return redirect()->route('admin.permission.show');
    }

    public function edit($id)
    {
        $data = Permission::find($id);
        $permissions = Permission::latest()->get();
        return view('backpanel.role-permission.permissions',compact('data','permissions'));
    }

    public function destroy($id)
    {
        $data = Permission::find($id);
        $data->delete();
        session()->flash('success', 'Permission Deleted successfully!');
        return redirect()->back();
    }
}
