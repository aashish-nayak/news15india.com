<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function websiteViewers()
    {
        $users = User::get();
        return view('backpanel.viewer.index',compact('users'));
    }
}
