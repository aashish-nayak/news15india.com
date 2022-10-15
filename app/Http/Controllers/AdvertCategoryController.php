<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\AdvertCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class AdvertCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = AdvertCategory::get();
        return view('backpanel.advert.advert-categories',compact('categories'));
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
    public function store(Request $request)
    {
        try {
            if($request->has('id')){
                $category = AdvertCategory::find($request->id);
                $request->session()->flash('success','Category Updated Successfully!');
            }else{
                $category = new AdvertCategory();
                $request->session()->flash('success','Category Added Successfully!');
            }
            $category->category = $request->cat_name;
            $category->slug = Str::slug($request->slug);
            $category->status = $request->status;
            $category->save();
        } catch (\Exception $e) {
            $request->session()->flash('error','Something Wrong Category not Save !');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvertCategory  $advertCategory
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertCategory $advertCategory)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvertCategory  $advertCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertCategory $advertCategory)
    {
        return response()->json($advertCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvertCategory  $advertCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertCategory $advertCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvertCategory  $advertCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertCategory $advertCategory)
    {
        $advertCategory->delete();
        request()->session()->flash('success','Category Delete Successfully !');
        return redirect()->back();
    }
}
