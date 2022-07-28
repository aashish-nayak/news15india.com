<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $catIds = [1,2,3,4,12,5,6,7,8,9,10,11,13,14,15,16,17];
        $section1 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(15)->with('newsImage');
        }])->find($catIds[0]);
        $section2 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(14)->with('newsImage');
        }])->find($catIds[1]);
        $section3 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(12)->with('newsImage');
        }])->find($catIds[2]);
        $section4 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(12)->with('newsImage');
        }])->find($catIds[3]);
        $section5 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(16)->with('newsImage');
        }])->find($catIds[4]);
        $section6 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(13)->with('newsImage');
        }])->find($catIds[5]);
        $section7 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(20)->with('newsImage');
        }])->find($catIds[6]);
        $section8 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(9)->with('newsImage');
        }])->find($catIds[7]);
        $section9 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(12)->with('newsImage');
        }])->find($catIds[8]);
        $section10 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(5)->with('newsImage');
        }])->find($catIds[9]);
        $section10_part2 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(5)->with('newsImage');
        }])->find($catIds[10]);
        $section10_part3 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query){
            $query->latest()->limit(5)->with('newsImage');
        }])->find($catIds[11]);
        // .......... Sidebar Queries ............ 
        $sidebar_1 = Category::with(['news'=>function($query){
            $query->latest()->limit(10);
        }])->find($catIds[12]);
        $sidebar_2 = Category::with(['news'=>function($query){
            $query->latest()->limit(4)->with('newsImage');
        }])->find($catIds[13]);
        $sidebar_3 = Category::with(['news'=>function($query){
            $query->latest()->limit(8);
        }])->find($catIds[14]);
        $sidebar_4 = Category::with(['news'=>function($query){
            $query->latest()->limit(6)->with('newsImage');
        }])->find($catIds[15]);
        $sidebar_5 = Category::with(['news'=>function($query){
            // ->where('format','video')
            $query->latest()->limit(6)->with('newsImage');
        }])->find($catIds[16]);
        return view('home',compact(
            'section1',
            'section2',
            'section3',
            'section4',
            'section5',
            'section6',
            'section7',
            'section8',
            'section9',
            'section10',
            'section10_part2',
            'section10_part3',
            'sidebar_1',
            'sidebar_2',
            'sidebar_3',
            'sidebar_4',
            'sidebar_5'
        ));
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
