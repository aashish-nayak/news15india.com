<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function websiteViewers(UserDataTable $datatable)
    {
        return $datatable->render('backpanel.viewer.index');
    }
    public function viewerBlock($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }
    public function viewerEdit($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function blockViewers()
    {
        $users = User::onlyTrashed()->get();
        $users_blocked = true;
        return view('backpanel.viewer.index',compact('users','users_blocked'));
    }

    public function viewerRestore($id){
        User::withTrashed()->find($id)->restore();
        return redirect()->back();
    }
}
