<?php

namespace App\Http\Controllers;

use App\DataTables\PageDataTable;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PageDataTable $datatable)
    {
        return $datatable->render('backpanel.page.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backpanel.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('id')){
            $page = Page::find($request->id);
            $message = 'Page Updated Successfully!';
            $valid_slug = '';
        }else{
            $page = new Page();
            $message = 'Page Created Successfully!';
            $valid_slug = '|unique:pages';
        }
        $this->validate($request, [
            'name' => 'required|max:350',
            'slug' => 'required'.$valid_slug,
            'status' => 'required',
            'template' => 'required',
            'meta_title' => 'max:350',
            'meta_description' => 'max:3000',
            'meta_keywords' => 'max:4000',
        ]);
        $request['admin_id'] = auth('admin')->id();
        $page->fill($request->all());
        $page->save();
        if ($request->has('edit_btn')) {
            return redirect()->route('admin.page.edit', $page->id)->with('success', $message);
        } else if($request->has('save_add_new')){
            return redirect()->route('admin.page.create')->with('success', $message);
        }else{
            return redirect()->route('admin.page.index')->with('success', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('backpanel.page.create',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->statistics()->delete();
        $page->delete();
        return redirect()->back()->with('success', 'Page Deleted Successfully!!!');
    }

    public function status(Page $page)
    {
        $page->status = ($page->status == 1) ? 0 : 1;
        $page->save();
        return response()->json(['success' => 'Status Changed Successfully!','status'=>$page->status]);
    }
}
