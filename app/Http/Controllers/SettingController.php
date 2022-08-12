<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id','cat_name')->get();
        $homeSections = json_decode(setting('HOME_SECTIONS'));
        return view('backpanel.setting.index',compact('categories','homeSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function updateSetting(string $key, $value = null)
    {
        $setting = createSetting($key);
        $setting->value = $value;
        $setting->save();
        return $setting->id;
    }

    public function homeSettingStore(Request $request)
    {
        try {
            $sections = json_encode($request->except('_token'));
            $this->updateSetting('HOME_SECTIONS',$sections);
            $request->flash('success','Home Page Setting Saved!');
        } catch (\Exception $e) {
            $request->flash('error',$e->getMessage());
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
