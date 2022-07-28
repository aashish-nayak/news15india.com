<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $catIds = [1,2,3,4,12,5,6,7,8,9,10,11,13,14,15,16,17];
        // ............ Sections Queries ............ 
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

    public function singleNews($newsUrl)
    {
        $news = News::with(['categories'=>function($query){
            $query->orderBy('parent_id','ASC');
        },'creator','tags','newsImage'])->where('slug',$newsUrl)->where('status',1)->where('is_published',1)->where('is_verified',1)->first();
        $moreCategoryNews = Category::with(['news'=>function($query)use($newsUrl){
            $query->where('slug','!=',$newsUrl)->latest()->limit(14)->with('newsImage');
        },'children'=>function($query){
            $query->limit(10);
        }])->find($news->categories->first()->id);
        $related = News::where('id','!=',$news->id)->whereHas('tags', function (Builder $query) use($news){
            $query->whereIn('tags.id',$news->tags->pluck('id')->toArray());
        })->with('newsImage')->latest()->limit(12)->get();

        // ....... Sidebar ..........
        $catIds = [18,19,20,5];
        $sidebar_1 = Category::with(['news'=>function($query){
            $query->latest()->limit(8);
        }])->find($catIds[0]);
        $sidebar_2 = Category::with(['news'=>function($query){
            $query->latest()->limit(10)->with('newsImage');
        }])->find($catIds[1]);
        $sidebar_3 = Category::with(['news'=>function($query){
            $query->latest()->limit(5);
        }])->find($catIds[2]);
        $sidebar_4 = Category::with(['news'=>function($query){
            $query->latest()->limit(5)->with('newsImage');
        }])->find($catIds[3]);
        return view('single',compact(
            'news',
            'moreCategoryNews',
            'related',
            'sidebar_1',
            'sidebar_2',
            'sidebar_3',
            'sidebar_4'
        ));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
