<?php

namespace App\Http\Controllers;

use App\Models\AdvertPlacement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdvertPlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $placements = AdvertPlacement::latest()->get();
        return view('backpanel.advert.advert-placements', compact('placements'));
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
        $request->validate([
            'group_name' => 'required|string',
            'name' => 'required|string',
            'slug' => 'required|string',
            'width' => 'numeric',
            'height' => 'numeric',
            'price' => 'numeric',
            'status' => 'required',
        ]);
        try {
            $request['slug'] = Str::slug($request->group_name . " " . $request->name . " " . $request['width'] . "x" . $request['height']);
            if ($request->has('id')) {
                AdvertPlacement::find($request->id)->update($request->except('_token','id'));
                request()->session()->flash('success', 'Ad Placement Updated !');
            } else {
                AdvertPlacement::create($request->except('_token'));
                request()->session()->flash('success', 'Ad Placement Added !');
            }
        } catch (\Exception $e) {
            request()->session()->flash('error', 'Something went wrong Data not Save !!!');
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdvertPlacement  $advertPlacement
     * @return \Illuminate\Http\Response
     */
    public function show(AdvertPlacement $advertPlacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdvertPlacement  $advertPlacement
     * @return \Illuminate\Http\Response
     */
    public function edit(AdvertPlacement $advertPlacement)
    {
        return response()->json($advertPlacement);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdvertPlacement  $advertPlacement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdvertPlacement $advertPlacement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdvertPlacement  $advertPlacement
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdvertPlacement $advertPlacement)
    {
        $advertPlacement->delete();
        request()->session()->flash('success', 'Ad Location Delete Successfully !');
        return redirect()->back();
    }
}
