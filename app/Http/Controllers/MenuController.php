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
    public function structure($value,$selcted,$selcted2)
    {
        return '<li class="dd-item">
            <div class="dd-handle dd3-handle"></div>
            <div class="dd3-content">
                <span class="float-start menu-name">'.$value->title.'</span>
                <span class="float-end modal-name me-4">'.$value->reference_type.'</span>
                <a class="show-item-details" type="button"><i class="bx bx-chevron-down"></i></a>
            </div>
            <div class="item-details">
                <div class="form-body">
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Title</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$value->title.'" placeholder="Title">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Icon</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$value->icon.'" placeholder="Icon">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>css</b></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" value="'.$value->css.'" placeholder="CSS Class">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-3 col-form-label"><b>Target</b></label>
                        <div class="col-sm-9">
                            <select name="" id="" class="form-control form-control-sm">
                                <option '.$selcted.' value="_self">Open Link Directly</option>
                                <option '.$selcted2.' value="_blank">Open Link in New Tab</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-sm btn-danger me-1 remove-menu" data-id="'.$value->id.'">Remove</button>
                            <button type="button" class="btn btn-sm btn-primary" for="">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>';
    }
    public function nestedMenu($menu)
    {
        $html = '<ol class="dd-list">';
        foreach ($menu->child as $value) {
            $selcted = ($value->target == '_self') ? 'selected' : '';
            $selcted2 = ($value->target == '_blank') ? 'selected' : '';
            if ($value->has_child == 1) {
                $html .= $this->structure($value,$selcted,$selcted2);;
                $html .= $this->nestedMenu($value).'</li>';
            } else {
                $html .= $this->structure($value,$selcted,$selcted2).'</li>';
            }
        }
        $html .= "</ol>";
        return $html;
    }
    public function structureFetch($menu_id)
    {   
        $nodes = MenuNodes::where('menu_id',$menu_id)->where('parent_id', 0)->orderBy('position')->get();
        $tree = '<ol class="dd-list">';
        foreach ($nodes as $value) {
            $selcted = ($value->target == '_self') ? 'selected' : '';
            $selcted2 = ($value->target == '_blank') ? 'selected' : '';
            $tree .= $this->structure($value,$selcted,$selcted2);
            if($value->has_child == 1){
                $tree .= $this->nestedMenu($value);
            }
            $tree .= '</li>';
        }
        $tree .= '</ol>';
        return response()->json($tree);
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
    public function destroy(MenuNodes $menuNodes)
    {
        $menuNodes->delete();
        return response()->json(['success' => 'MenuNode deleted successfully!']);
    }
}
