<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\News;
use App\Models\Media;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class NewsController extends Controller
{   
    public function fetch_media(Request $request)
    {
        if ($request->ajax()) {
            $media = Media::latest()->paginate(12);
            return view('backpanel.news.media-box', compact('media'))->render();
        }
    }
    
    public function index()
    {   $media = Media::latest()->paginate(12);
        $tags = Tag::where('status',1)->get();
        $categories = Category::with('children')->where('parent_id', NULL)->where('status',1)->get();
        return view('backpanel.news.add-news',compact('categories','tags','media'));
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
        $totalRecords = News::select('count(*) as allcount')->count();
        $totalRecordswithFilter = News::select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = News::with('category','img')->orderBy($columnName, $columnSortOrder)
            ->where('news.title', 'like', '%' . $searchValue . '%')->orWhere('news.slug','like','%' . $searchValue . '%')
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
            $categories = implode(",", $record->category->pluck('slug')->toArray());
            $banner = ($record->image != NULL) ? $record->img->img : 'No Image';
            $status = $record->status;
            $created = $record->created_at;

            $data_arr[] = array(
                "sno" => $sno,
                "id" => $id,
                "title" => $cat_name,
                "slug" => $slug,
                "categories" => $categories,
                "banner" => $banner,
                "status" => $status,
                "created" => $created,
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
        // dd($request->all());
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
            'title' => 'required|max:150',
            'slug' => 'required'.$valide_slug,
            'image' => 'required|integer',
            'is_published' => 'required',
            'categories' => 'required|array',
            'short_desc' => 'max:5000',
            'page_order' => 'integer',
            'meta_title' => 'max:200',
            'meta_description' => 'max:2000',
            'meta_keywords' => 'max:2000',
        ]);
        $news->title = $request->title;
        $news->slug = $request->slug;
        $news->short_description = $request->short_desc;
        $news->user_id = $request->user_id;
        $news->content = $request->content;
        $news->is_published = 0;
        $news->status =  $request->is_published;
        $news->is_verified = 0;
        $news->page_order = 0;
        $news->image = $request->image;
        $news->meta_title = $request->meta_title;
        $news->meta_keywords = $request->meta_keywords;
        $news->meta_description = $request->meta_description;
        $news->save();
        $news->category()->sync($request->categories);
        $news->tags()->sync($request->tags);
        if ($request->has('edit_btn')) {
            return redirect()->route('admin.news.edit', $news->id)->with('success', $message);
        } else {
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

    public function show()
    {
        return view('backpanel.news.view-news');
    }

    public function edit($id)
    {   
        $media = Media::latest()->paginate(12);
        $tags = Tag::where('status',1)->get();
        $categories = Category::with('children')->where('parent_id', NULL)->where('status',1)->get();
        $page = News::find($id);
        return view('backpanel.news.add-news',compact('categories','tags','page','media'));
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

        // Total records
        $totalRecords = News::onlyTrashed()->select('count(*) as allcount')->count();
        $totalRecordswithFilter = News::onlyTrashed()->select('count(*) as allcount')->where('title', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = News::with('category','img')->onlyTrashed()->orderBy($columnName, $columnSortOrder)
            ->where('news.title', 'like', '%' . $searchValue . '%')
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
            $categories = implode(",", $record->category->pluck('slug')->toArray());
            $banner = ($record->image != NULL) ? $record->img->img : 'No Image';
            $status = $record->status;
            $created = Carbon::createFromTimeStamp(strtotime($record->deleted_at) )->diffForHumans();

            $data_arr[] = array(
                "sno" => $sno,
                "id" => $id,
                "title" => $cat_name,
                "slug" => $slug,
                "categories" => $categories,
                "banner" => $banner,
                "status" => $status,
                "created" => $created,
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
