<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class WorldDataController extends Controller
{
    public function countries()
    {
        return response()->json(['countries'=>Country::get()]);
    }

    public function states($country_id)
    {
        return response()->json(['states'=>State::where('country_id',$country_id)->get()]);
    }

    public function cities($state_id)
    {
        return response()->json(['cities'=>City::where('state_id',$state_id)->get()]);
    }
}
