<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        foreach ($categories as $key => $value) {
            $categories[$key]->bread = $this->getBreadcrumb($value->parent_id).$value->cat_name;
        }
        return view('backpanel.category.index', compact('categories'));
    }
    public function getBreadcrumb($parent_id,$breadcrumb = '')
    {
        $category = Category::find($parent_id);
        if ($category) {
            $breadcrumb .= $category->cat_name." / ".$this->getBreadcrumb($category->parent_id,$breadcrumb);
        }
        return $breadcrumb;
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
        // dd($request->all());
        $request['location'] = implode(",", $request->location);
        if ($request['parent_id'] == 'null') {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
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
            ->where('categories.cat_name', 'like', '%' . $searchValue . '%')
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
            $created = $record->created_at;

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(['success' => 'Category deleted successfully!']);
    }
}
