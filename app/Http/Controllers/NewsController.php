<?php

namespace App\Http\Controllers;

use App\DataTables\NewsDataTable;
use App\Models\Admin;
use Carbon\Carbon;
use App\Models\Tag;
use App\Models\News;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Berkayk\OneSignal\OneSignalFacade as OneSignal;
class NewsController extends Controller
{
    public function index()
    {
        if (Admin::find(auth('admin')->id())->hasRole('super-admin') == true) {
            $users = Admin::get();
        } else {
            $users = Admin::whereHas('roles', function (Builder $query) {
                $query->where('slug', '!=', 'super-admin');
            })->get();
        }
        $media = Media::latest()->paginate(12);
        $tags = Tag::where('status', 1)->select('id','name','slug')->get();
        $categories = $this->nestedCategoryPath();
        return view('backpanel.news.add-news', compact('categories', 'tags', 'media', 'users'));
    }

    public function store(Request $request)
    {
        $auth = Admin::find(auth('admin')->id());
        if (isset($request->id)) {
            $news = News::find($request->id);
            $message = 'News Updated Successfully!';
            $valide_slug = '';
        } else {
            $news = new News();
            $message = 'News Created Successfully!';
            $valide_slug = '|unique:news';
        }
        $this->validate($request, [
            'title' => 'required|max:350',
            'slug' => 'required' . $valide_slug,
            'image' => 'required|integer',
            'is_published' => 'required',
            'format' => 'required',
            'categories' => 'required|array',
            'short_desc' => 'max:500',
            'page_order' => 'integer',
            'meta_title' => 'max:350',
            'meta_description' => 'max:3000',
            'meta_keywords' => 'max:4000',
        ]);
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->short_description = $request->short_desc;
        $news->admin_id = ($auth->hasRole('super-admin') == true || $auth->hasRole('admin') == true) ? $request->user_id : $auth->id;
        $news->content = $request->content;
        $news->is_published = $request->is_published;
        $news->status =  1;
        $news->is_verified = 1;
        $news->page_order = 0;
        $news->image = $request->image;
        $news->format = $request->format;
        $news->youtube_url = $request->youtube_url;
        $news->is_featured = (isset($request->is_featured) && $auth->hasRole('super-admin') == true) ? 1 : 0;
        $news->meta_title = $request->meta_title;
        $news->meta_keywords = $request->meta_keywords;
        $news->meta_description = $request->meta_description;
        $news->created_at = ($request->created_at != '') ? Carbon::parse($request->created_at)->format("Y-m-d ".now()->format('H:i:s')) : now()->toDateTimeString();
        $news->save();
        $news->categories()->sync($request->categories);
        $news->tags()->sync($request->tags);
        if($news->created_at >= now()->toDateTimeString() && $request->is_published == 1){
            OneSignal::sendNotificationToAll(
                $request->title,
                $url = route('single-news',$request->slug), 
                $data = null, 
                $buttons = null, 
                $schedule = null
            );
        }
        if ($request->has('edit_btn')) {
            return redirect()->route('admin.news.edit', $news->id)->with('success', $message);
        } else if($request->has('save_add_new')){
            return redirect()->route('admin.news.create')->with('success', $message);
        }else{
            return redirect()->route('admin.news.view-all-news')->with('success', $message);
        }
    }

    public function status($id)
    {
        $status = News::withTrashed()->find($id);
        $status->status = ($status->status == 1) ? 0 : 1;
        $status->save();
        return response()->json(['success' => 'Status Changed Successfully!','status'=>$status->status]);
    }

    public function show(NewsDataTable $datatable)
    {
        $authors = Admin::select('id','name')->get();
        return $datatable->render('backpanel.news.view-news',compact('authors'));
    }

    public function edit($id)
    {
        $auth = Admin::find(auth('admin')->id());
        if (Admin::find(auth('admin')->id())->hasRole('super-admin') == true) {
            $users = Admin::get();
        } else {
            $users = Admin::whereHas('roles', function (Builder $query) {
                $query->where('slug', '!=', 'super-admin');
            })->get();
        }
        if(News::where('admin_id',$auth->id)->where('id',$id)->count() == 0 && ($auth->hasRole('super-admin') == false && $auth->hasRole('admin') == false)){
            return redirect()->back();
        }
        $media = Media::latest()->paginate(12);
        $tags = Tag::where('status', 1)->get();
        $categories = $this->nestedCategoryPath();
        $page = News::find($id);
        return view('backpanel.news.add-news', compact('categories', 'tags', 'page', 'media', 'users'));
    }

    public function trashview()
    {
        $datatable = new NewsDataTable('trash');
        $authors = Admin::select('id','name')->get();
        return $datatable->render('backpanel.news.trash-news',compact('authors'));
    }

    public function restore($id)
    {
        $page = News::withTrashed()->find($id);
        $page->restore();
        return redirect()->route('admin.news.trash-news')->with('success', 'News Restored Successfully!');
    }
    public function trash($id)
    {
        $page = News::find($id);
        $page->delete();
        return redirect()->route('admin.news.view-all-news')->with('success', 'News Moved to Trash!');
    }

    public function destroy($id)
    {
        $page = News::withTrashed()->find($id);
        $page->forceDelete();
        return redirect()->route('admin.news.trash-news')->with('success', 'News Deleted Permanently!');
    }
}
