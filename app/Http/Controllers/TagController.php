<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {   
        return view('backpanel.tag.index');
    }

    public function store(Request $request)
    {
        if ($request->has('id') && $request->id != '') {
            $category = Tag::find($request->id);
            $category->update($request->all());
            $request->session()->flash('success', 'Tag Updated successfully!');
        } else {
            Tag::create($request->all());
            $request->session()->flash('success', 'Tag added successfully!');
        }
        return redirect()->route('admin.tag.index');
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
        $totalRecords = Tag::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Tag::select('count(*) as allcount')->where('name', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Tag::orderBy($columnName, $columnSortOrder)
            ->where('tags.name', 'like', '%' . $searchValue . '%')
            ->select('tags.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $tag = $record->name;
            $slug = $record->slug;
            $status = $record->status;
            $created = Carbon::parse($record->created_at)->diffForHumans();

            $data_arr[] = array(
                "id" => $id,
                "name" => $tag,
                "slug" => $slug,
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

    public function edit(Tag $tag)
    {
        $tag->editImg = $tag->tagImage;
        return response()->json($tag);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json(['success' => 'Category deleted successfully!']);
    }
}
