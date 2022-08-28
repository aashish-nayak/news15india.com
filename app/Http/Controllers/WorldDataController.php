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
        $data = collect();
        Country::orderBy('name')->select(['id','name'])->chunk(10, function($countries)use($data){
            foreach ($countries as $country){
                $data->push($country);
            }
        });
        return response()->json($data);
    }

    public function states($country_id)
    {
        $data = collect();
        State::where('country_id', $country_id)->orderBy('name')->select(['id','name'])->chunk(10, function($states)use($data){
            foreach ($states as $state){
                $data->push($state);
            }
        });
        return response()->json($data);
    }

    public function cities($state_id)
    {
        $data = collect();
        City::where('state_id', $state_id)->orderBy('name')->select(['id','name'])->chunk(10, function($cities)use($data){
            foreach ($cities as $city){
                $data->push($city);
            }
        });
        return response()->json($data);
    }
}
