<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('admin.rolespermissions.permissions', compact('permissions'));
    }

    public function create()
    {
        return view('admin.rolespermissions.add-permission');
    }

    public function store(Request $request)
    {
        if($request->has('id')){
            Permission::find($request->id)->update($request->all());
        }else{
            Permission::create($request->all());
        }
        return redirect()->route('admin.permission.show');
    }

    public function edit($id)
    {
        $data = Permission::find($id);
        return view('admin.rolespermissions.add-permission',compact('data'));
    }

    public function destroy($id)
    {
        $data = Permission::find($id);
        $data->delete();
        return redirect()->back();
    }
}
