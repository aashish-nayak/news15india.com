<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Media;
use App\Models\News;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalNews = News::query();
        $totalComments = Comment::query();
        $totalFiles = Media::query();
        $totalUsers = User::count();
        $recentNews = News::query();
        $topCategories = Category::query();
        if(!auth('admin')->user()->hasRole('super-admin','admin')){
            $recentNews->where('admin_id',auth('admin')->id());
            $topCategories->whereHas('news',function($query){
                $query->where('admin_id',auth('admin')->id());
            });
            $totalNews->where('admin_id',auth('admin')->id());
            $totalFiles->where('admin_id',auth('admin')->id());
            $totalComments->where('commentable_type',get_class($totalNews))->whereHas('commentable',function($query){$query->where('admin_id',auth('admin')->id());});
        }
        $totalNews = $totalNews->count();
        $totalFiles = $totalFiles->count();
        $totalComments = $totalComments->count();
        $recentNews = $recentNews->where('status',1)->where('is_verified',1)->where('is_published',1)->latest()->take(10)->select('id','title','slug','image')->get();
        $topCategories = $topCategories->where('parent_id',NULL)->where('status',1)->select('id', 'cat_name', 'slug')->get();
        $collect = collect();
        foreach ($topCategories as $key => $cat){
            $cat->nestedNewsCount = $cat->countTotalPosts();
            $collect->push($cat);
        }
        $topCategories = $collect->sortByDesc('nestedNewsCount')->take(5);
        return view('backpanel.dashboard',compact('totalUsers','totalNews','totalComments','totalFiles','recentNews','topCategories'));
    }

    public function websiteViewers(UserDataTable $datatable)
    {
        $users_blocked = false;
        return $datatable->render('backpanel.viewer.index', compact('users_blocked'));
    }

    public function viewerBlock($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.viewer.index');
    }

    public function viewerDestroy($id)
    {
        User::withTrashed()->find($id)->forceDelete();
        return redirect()->route('admin.viewer.block');
    }

    public function details($id, $page = 'index')
    {
        $data = User::query();
        if ($page == 'trash') {
            $data->withTrashed();
        }
        $data = $data->with('details')->find($id);
        return view('backpanel.viewer.details', compact('data', 'page'));
    }

    public function blockViewers()
    {
        $datatable = new UserDataTable('trash');
        $users_blocked = true;
        return $datatable->render('backpanel.viewer.index', compact('users_blocked'));
    }

    public function viewerRestore($id)
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->route('admin.viewer.index');
    }
}
