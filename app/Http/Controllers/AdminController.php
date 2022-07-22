<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class AdminController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->user()->hasRole('super-admin') == false){
            $users = Admin::whereHas('roles', function (Builder $query) {
                $query->where('slug', '!=', 'super-admin');
            })->get();
        }else{
            $users = Admin::get();
        }
        return view('backpanel.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('slug','!=','super-admin')->get();
        $permissions = Permission::get();
        return view('backpanel.user.add-user',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('id')){
            $admin = Admin::find($request->id);
            $checkEmail = '';
            $request->session()->flash('success', 'Member Updated successfully!');
        }else{
            $admin = new Admin();
            $checkEmail = 'unique:admins';
            $request->session()->flash('success', 'Member Added successfully!');
        }
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',$checkEmail],
        ]);
        
        if($request->has('password')){
            $admin->password = Hash::make($request->password);
        }
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        $admin->roles()->sync($request->roles);
        $newPermission = collect();
        foreach ($admin->roles as $key => $role) {
            foreach ($request->permissions as $sub => $item) {
                if(!in_array($item, $role->permissions->pluck('id')->toArray())){
                    $newPermission->push($request['permissions'][$sub]);
                }
            }
        }
        $admin->permissions()->sync($newPermission);
        if($request->has('add')){
            return redirect()->route('admin.user.add');
        }else if($request->has('edit')){
            return redirect()->route('admin.user.edit',$request->id);
        }else{
            return redirect()->route('admin.user.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = Admin::onlyTrashed()->get();
        return view('backpanel.user.blocked',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Admin::whereHas('roles', function (Builder $query) {
            $query->where('slug','super-admin');
        })->where('id',$id)->count();
        if($count > 0){
            return redirect()->back();
        }
        $user = Admin::find($id);
        $roles = Role::where('slug','!=','super-admin')->get();
        $permissions = Permission::get();
        return view('backpanel.user.add-user',compact('user','roles','permissions'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Admin::whereHas('roles', function (Builder $query) {
            $query->where('slug','super-admin');
        })->where('id',$id)->count();
        if($count > 0){
            return redirect()->back();
        }
        Admin::find($id)->delete();
        session()->flash('success', 'Member Block successfully!');
        return redirect()->back();
    }

    public function restore($id)
    {
        Admin::withTrashed()->find($id)->restore();
        session()->flash('success', 'Member Unblock successfully!');
        return redirect()->back();
    }

    public function forceDelete($id)
    {
        $count = Admin::whereHas('roles', function (Builder $query) {
            $query->where('slug','super-admin');
        })->where('id',$id)->count();
        if($count > 0){
            return redirect()->back();
        }
        Admin::withTrashed()->find($id)->forceDelete();
        session()->flash('success', 'Member Deleted successfully!');
        return redirect()->back();
    }
}
