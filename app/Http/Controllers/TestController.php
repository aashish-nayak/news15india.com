<?php

namespace App\Http\Controllers;

use App\DataTables\NewsDataTable;
use App\Models\Category;
use App\Models\Media;
use App\Models\News;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

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
        // dd($datatable);
        // return $datatable->render('test');
        // dd();
    }

}
