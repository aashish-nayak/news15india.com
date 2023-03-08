<?php

namespace App\Http\Controllers;

use App\DataTables\AdminDataTable;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
class AdminController extends Controller
{
    public function index(AdminDataTable $datatable)
    {
        $roles = Role::get();
        return $datatable->render('backpanel.user.index',compact('roles'));

    }

    public function create()
    {
        $roles = Role::where('slug','!=','super-admin')->get();
        $permissions = Permission::get();
        return view('backpanel.user.add-user',compact('roles','permissions'));
    }

    public function store(Request $request)
    {
        if($request->has('id')){
            $admin = Admin::find($request->id);
            $checkEmail = '';
            $request->session()->flash('success', 'Member Updated successfully!');
            if($request->password != ''){
                $admin->password = Hash::make($request->password);
            }
        }else{
            $admin = new Admin();
            $checkEmail = 'unique:admins';
            $request->session()->flash('success', 'Member Added successfully!');
            $admin->password = ($request->password != '') ? Hash::make($request->password) : Hash::make($request->email);
        }
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',$checkEmail],
        ]);
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
        $admin->details()->updateOrCreate([
            'url'=> strtolower(Str::random(16))."/".Str::slug($request->name),
            'phone' => $request->phone,
        ]);
        if($request->has('add')){
            return redirect()->route('admin.user.add');
        }else if($request->has('edit')){
            return redirect()->route('admin.user.edit',$request->id);
        }else{
            return redirect()->route('admin.user.index');
        }
    }

    public function show()
    {
        $users = Admin::onlyTrashed()->get();
        return view('backpanel.user.blocked',compact('users'));
    }

    public function edit($id)
    {
        $count = Admin::whereHas('roles', function (Builder $query) {
            $query->where('slug','super-admin');
        })->where('id',$id)->count();
        if($count > 0){
        return redirect()->back()->with('error','Not Authrized to Delete Super Admin');
        }
        $user = Admin::find($id);
        $roles = Role::where('slug','!=','super-admin')->get();
        $permissions = Permission::get();
        return view('backpanel.user.add-user',compact('user','roles','permissions'));
    }

    public function destroy($id)
    {
        $count = Admin::whereHas('roles', function (Builder $query) {
            $query->where('slug','super-admin');
        })->where('id',$id)->count();
        if($count > 0){
            session()->flash('error', 'Not Authorised to delete');
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
            session()->flash('error', 'Not Authorised to Permanent delete');
            return redirect()->back();
        }
        Admin::withTrashed()->find($id)->forceDelete();
        session()->flash('success', 'Member Deleted successfully!');
        return redirect()->back();
    }

    public function status($id)
    {
        $status = Admin::withTrashed()->find($id);
        $status->status = ($status->status == 1) ? 0 : 1;
        $status->save();
        return response()->json(['success' => 'Status Changed Successfully!','status'=>$status->status]);
    }

    // Global Function for bulk delete
    public function bulkDelete(Request $request)
    {
        try {
            $request->model::whereIn('id',$request->ids)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Items Delete Successfully!!!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    public function bulkDestroy(Request $request)
    {
        try {
            $request->model::onlyTrashed()->whereIn('id',$request->ids)->forceDelete();
            return response()->json([
                'status' => 'success',
                'message' => 'Items Delete Permanently Successfully!!!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function profile()
    {
        return view('backpanel.profile');
    }
}
