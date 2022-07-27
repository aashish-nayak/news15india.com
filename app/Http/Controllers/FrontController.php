<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $catIds = [1,2,3,4,12,5,6,7,8,9,10,11];
        $section1 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(15);
        }])->find($catIds[0]);
        $section2 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(14);
        }])->find($catIds[1]);
        $section3 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(12);
        }])->find($catIds[2]);
        $section4 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(12);
        }])->find($catIds[3]);
        $section5 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(16);
        }])->find($catIds[4]);
        $section6 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(13);
        }])->find($catIds[5]);
        $section7 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(20);
        }])->find($catIds[6]);
        $section8 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(9);
        }])->find($catIds[7]);
        $section9 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(12);
        }])->find($catIds[8]);
        $section10 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(5);
        }])->find($catIds[9]);
        $section10_part2 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(5);
        }])->find($catIds[10]);
        $section10_part3 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->limit(5);
        }])->find($catIds[11]);
        return view('home',compact('section1','section2','section3','section4','section5','section6','section7','section8','section9','section10','section10_part2','section10_part3'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
