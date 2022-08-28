<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

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
        $homeSections = json_decode(setting('home_page_settings'));
        $categoryPageSetting = json_decode(setting('category_page_settings'));
        $singlePageSetting = json_decode(setting('single_page_settings'));
        $authorPageSetting = json_decode(setting('author_page_settings'));
        $tagPageSetting = json_decode(setting('tag_page_settings'));
        return view('backpanel.setting.index',compact(
            'categories',
            'homeSections',
            'categoryPageSetting',
            'singlePageSetting',
            'authorPageSetting',
            'tagPageSetting'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            foreach ($request->except('_token') as $key => $value) {
                if($key == 'special_coverage'){
                    $value['block_1']['status'] = isset($value['block_1']['status']) ? 1 : 0;
                    $value['block_2']['status'] = isset($value['block_2']['status']) ? 1 : 0;
                    $value['block_3']['status'] = isset($value['block_3']['status']) ? 1 : 0;
                    $value = json_encode($value);
                }
                if($key == 'site_social_links'){
                    $value = json_encode($value);
                }
                $this->updateSetting($key,$value);
            }
            $request->session()->flash('success','Setting Saved!');
        } catch (\Exception $e) {
            $request->session()->flash('error',$e->getMessage());
        }
        return redirect()->back();
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

    public function pageSettingStore(Request $request)
    {
        try {
            $sections = json_encode($request->except('_token','page_setting'));
            $this->updateSetting($request->page_setting,$sections);
            $request->session()->flash('success','Page Setting Saved!');
        } catch (\Exception $e) {
            $request->session()->flash('error',$e->getMessage());
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
