<?php

namespace App\Http\Controllers;

use App\DataTables\NewsDataTable;
use App\Models\Admin;
use App\Models\Advert;
use App\Models\Category;
use App\Models\Media;
use App\Models\News;
use App\Models\Poll;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class TestController extends Controller
{
    public function test(NewsDataTable $datatable)
    {
        // return DataTables::of(News::query())
        // ->addColumn('selectbox', function(News $news) {
        //     return view('components.datatable.checkbox',['id'=>$news->id]);
        // })
        // ->setRowId(function ($news) {
        //     return $news->id;
        // })->make(true);
        // dd(request()->url());
        // // return $datatable->render('test');
        // $loc = 'home-section-1-sidebar-300x350';
        // $loc = 'home-section-3-bottom-800x100';
        // // $loc = 'home-header-1200x150';
        // $ad = AdvertHTML($loc,[
        //     'adtext' => false,
        //     'slider' => true,
        //     'counts' => 2,
        // ]);
        // // $ad = AdvertHTML($loc);
        // dd(Admin::with(['details'])->whereHas('roles',function($query){
        //     $query->where('slug','super-admin');
        // })->first()->toArray());

        //fetch the most visited pages for today and the past week
        
        dd(Analytics::fetchVisitorsAndPageViews(Period::days(7)));
    }
}
