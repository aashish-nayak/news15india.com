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
class NewsController extends Controller
{

    public function index()
    {
        if (auth('admin')->user()->hasRole('super-admin') == true) {
            $users = Admin::get();
        } else {
            $users = Admin::whereHas('roles', function (Builder $query) {
                $query->where('slug', '!=', 'super-admin');
            })->get();
        }
        $media = Media::latest()->paginate(12);
        $tags = Tag::where('status', 1)->get();
        $categories = $this->nestedCategoryPath();
        return view('backpanel.news.add-news', compact('categories', 'tags', 'media', 'users'));
    }

    public function view_news(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        if (auth('admin')->user()->hasRole('super-admin') == true) {
            $totalRecords = News::select('count(*) as allcount')->count();
            $totalRecordswithFilter = News::select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
        } elseif (auth('admin')->user()->hasRole('admin') == true) {
            $super = Admin::whereHas('roles',function(Builder $query){
                $query->where('slug','super-admin');
            })->first();
            $totalRecords = News::where('admin_id','!=',$super->id)->select('count(*) as allcount')->count();
            $totalRecordswithFilter = News::where('admin_id','!=',$super->id)->select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
        } else {
            $totalRecords = News::where('admin_id', auth('admin')->user()->id)->select('count(*) as allcount')->count();
            $totalRecordswithFilter = News::where('admin_id', auth('admin')->user()->id)->select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
        }
        // Fetch records
        $records = News::with('categories', 'newsImage', 'creator')->orderBy($columnName, $columnSortOrder);
        if (auth('admin')->user()->hasRole('admin') == true) {
            $super = Admin::whereHas('roles',function(Builder $query){
                $query->where('slug','super-admin');
            })->first();
            $records = $records->where('admin_id','!=',$super->id);
        } elseif (auth('admin')->user()->hasRole('super-admin') == false && auth('admin')->user()->hasRole('admin') == false) {
            $records = $records->where('admin_id', auth('admin')->user()->id);
        }
        $records = $records->where(function ($query) use ($searchValue) {
            $query->where('news.title', 'like', '%' . $searchValue . '%')->orWhere('news.slug', 'like', '%' . $searchValue . '%');
        })
        ->select('news.*')
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data_arr = array();
        foreach ($records as $key => $record) {
            $sno = $key + 1;
            $id = $record->id;
            $title = Str::limit($record->title, 50);
            $slug = $record->slug;
            $categories = implode(",", $record->categories->pluck('slug')->toArray());
            $banner = ($record->image != NULL) ? $record->newsImage->filename : 'No Image';
            $status = $record->status;
            $views = $record->getViews();
            $created = $record->created_at;
            $createdDate = date('d-M-Y', strtotime($created));
            $createdby = $record->creator->name;
            $data_arr[] = array(
                "sno" => $sno,
                "id" => $id,
                "title" => $title,
                "slug" => $slug,
                "categories" => $categories,
                "banner" => $banner,
                "status" => $status,
                "created_by" => $createdby,
                "views" =>$views,
                "created_at" => $created,
                "created_date" => $createdDate,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }

    public function store(Request $request)
    {
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
        $news->admin_id = (auth('admin')->user()->hasRole('super-admin') == true || auth('admin')->user()->hasRole('admin') == true) ? $request->user_id : auth('admin')->user()->id;
        $news->content = $request->content;
        $news->is_published = $request->is_published;
        $news->status =  1;
        $news->is_verified = 1;
        $news->page_order = 0;
        $news->image = $request->image;
        $news->format = $request->format;
        $news->youtube_url = $request->youtube_url;
        $news->is_featured = (isset($request->is_featured) && auth('admin')->user()->hasRole('super-admin') == true) ? 1 : 0;
        $news->meta_title = $request->meta_title;
        $news->meta_keywords = $request->meta_keywords;
        $news->meta_description = $request->meta_description;
        $news->created_at = ($request->created_at != '') ? Carbon::parse($request->created_at)->format("Y-m-d ".now()->format('H:i:s')) : now()->toDateTimeString();
        $news->save();
        $news->categories()->sync($request->categories);
        $news->tags()->sync($request->tags);
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
        $status = News::find($id);
        $status->status = ($status->status == 1) ? 0 : 1;
        $status->save();
        return response()->json(['success' => 'Status Changed Successfully!']);
    }

    public function show(NewsDataTable $datatable)
    {
        return $datatable->render('backpanel.news.view-news');
    }

    public function edit($id)
    {
        if (auth('admin')->user()->hasRole('super-admin') == true) {
            $users = Admin::get();
        } else {
            $users = Admin::whereHas('roles', function (Builder $query) {
                $query->where('slug', '!=', 'super-admin');
            })->get();
        }
        if(News::where('admin_id',auth('admin')->user()->id)->where('id',$id)->count() == 0 && (auth('admin')->user()->hasRole('super-admin') == false && auth('admin')->user()->hasRole('admin') == false)){
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
        return view('backpanel.news.trash-news');
    }

    public function ajaxtrash(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total Trashed records
        if (auth('admin')->user()->hasRole('super-admin') == true) {
            $totalRecords = News::onlyTrashed()->select('count(*) as allcount')->count();
            $totalRecordswithFilter = News::onlyTrashed()->select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
        } elseif (auth('admin')->user()->hasRole('admin') == true) {
            $super = Admin::whereHas('roles',function(Builder $query){
                $query->where('slug','super-admin');
            })->first();
            $totalRecords = News::onlyTrashed()->where('admin_id','!=',$super->id)->select('count(*) as allcount')->count();
            $totalRecordswithFilter = News::onlyTrashed()->where('admin_id','!=',$super->id)->select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
        } else {
            $totalRecords = News::onlyTrashed()->where('admin_id', auth('admin')->user()->id)->select('count(*) as allcount')->count();
            $totalRecordswithFilter = News::onlyTrashed()->where('admin_id', auth('admin')->user()->id)->select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();
        }

        // Fetch records
        $records = News::with('categories', 'newsImage', 'creator')->onlyTrashed()->orderBy($columnName, $columnSortOrder);
        if (auth('admin')->user()->hasRole('admin') == true) {
            $super = Admin::whereHas('roles',function(Builder $query){
                $query->where('slug','super-admin');
            })->first();
            $records = $records->where('admin_id','!=',$super->id);
        } elseif (auth('admin')->user()->hasRole('super-admin') == false && auth('admin')->user()->hasRole('admin') == false) {
            $records = $records->where('admin_id', auth('admin')->user()->id);
        }
        $records = $records->where(function ($query) use ($searchValue) {
            $query->where('news.title', 'like', '%' . $searchValue . '%')->orWhere('news.slug', 'like', '%' . $searchValue . '%');
        })
        ->select('news.*')
        ->skip($start)
        ->take($rowperpage)
        ->get();

        $data_arr = array();

        foreach ($records as $key => $record) {
            $sno = $key + 1;
            $id = $record->id;
            $cat_name = $record->title;
            $slug = $record->slug;
            $categories = implode(",", $record->categories->pluck('slug')->toArray());
            $banner = ($record->image != NULL) ? $record->newsImage->filename : 'No Image';
            $status = $record->status;
            $created = Carbon::createFromTimeStamp(strtotime($record->deleted_at))->diffForHumans();
            $createdby = $record->creator->name;
            $data_arr[] = array(
                "sno" => $sno,
                "id" => $id,
                "title" => $cat_name,
                "slug" => $slug,
                "categories" => $categories,
                "banner" => $banner,
                "status" => $status,
                "created" => $createdby,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
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
