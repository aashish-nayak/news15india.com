<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        
        $media = Media::latest()->paginate(12);
        $categories = $this->nestedCategoryPath();
        return view('backpanel.category.index', compact('categories','media'));
    }

    public function store(Request $request)
    {
        if ($request['parent_id'] == '0') {
            $request['parent_id'] = NULL;
        }
        if ($request->has('id') && $request->id != '') {
            $category = Category::find($request->id);
            $category->update($request->all());
            $request->session()->flash('success', 'Category Updated successfully!');
        } else {
            Category::create($request->all());
            $request->session()->flash('success', 'Category added successfully!');
        }
        return redirect()->route('admin.category.index');
    }

    public function show(Request $request)
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
        $totalRecords = Category::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Category::select('count(*) as allcount')->where('cat_name', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Category::orderBy($columnName, $columnSortOrder)
            ->where('categories.cat_name', 'like', '%' . $searchValue . '%')->orWhere('categories.slug', 'like', '%' . $searchValue . '%')
            ->select('categories.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $cat_name = $record->cat_name;
            $slug = $record->slug;
            $cat_order = $record->cat_order;
            $status = $record->status;
            $created = Carbon::parse($record->created_at)->diffForHumans();

            $data_arr[] = array(
                "id" => $id,
                "cat_name" => $cat_name,
                "slug" => $slug,
                "cat_order" => $cat_order,
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

    public function edit(Category $category)
    {   
        $category->editImg = $category->catImage;
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['success' => 'Category deleted successfully!']);
    }
}
