<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuLocation;
use App\Models\MenuNodes;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($menu_id = null)
    {
        $MenuLocations = MenuLocation::all();
        $menus = Menu::all();
        $categories = Category::orderBy('parent_id','ASC')->select('id','cat_name','slug')->get();
        $tags = Tag::orderBy('id','ASC')->select('id','name','slug')->get();
        return view('backpanel.menu.index',compact('categories','tags','MenuLocations','menus','menu_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return redirect()->route('admin.menu.index',$request->menu_select);
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
        Menu::create($request->all());
        $request->session()->flash('success', 'Menu Saved!');
        return redirect()->back();
    }

    public function location_store(Request $request)
    {
        MenuLocation::create($request->all());
        $request->session()->flash('success', 'Location Saved!');
        return redirect()->back();
    }

    public function structureFetch($menu_id)
    {
        $nodes = MenuNodes::where('menu_id',$menu_id)->orderBy('position','ASC')->get();
        return response()->json($nodes);
    }

    public function addToMenu(Request $request)
    {
        try {
            if(isset($request->menus)){
                foreach ($request->menus as $key => $value) {
                    $menuNode = new MenuNodes();
                    $menuNode->menu_id = $request->menus[$key]['menu_id'];
                    $menuNode->reference_id = $request->menus[$key]['reference_id'];
                    $menuNode->reference_type = $request->menus[$key]['reference_type'];    
                    $menuNode->title = $request->menus[$key]['title'];
                    $menuNode->position = MenuNodes::where('menu_id',$request->menus[$key]['menu_id'])->count() + 1;
                    $menuNode->save();
                }
            }
            return response()->json(['success'=>'Node Saved']);
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
