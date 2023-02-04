<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function websiteViewers(UserDataTable $datatable)
    {
        $users_blocked = false;
        return $datatable->render('backpanel.viewer.index',compact('users_blocked'));
    }
    public function viewerBlock($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.viewer.index');
    }
    public function viewerDestroy($id)
    {
        User::withTrashed()->find($id)->forceDelete();
        return redirect()->route('admin.viewer.block');
    }

    public function details($id,$page = 'index')
    {
        $data = User::query();
        if($page=='trash'){
            $data->withTrashed();
        }
        $data = $data->with('details')->find($id);
        return view('backpanel.viewer.details',compact('data','page'));
    }

    public function blockViewers()
    {
        $datatable = new UserDataTable('trash');
        $users_blocked = true;
        return $datatable->render('backpanel.viewer.index',compact('users_blocked'));
    }

    public function viewerRestore($id){
        User::withTrashed()->find($id)->restore();
        return redirect()->route('admin.viewer.index');
    }
}
