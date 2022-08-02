<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuLocation;
use App\Models\MenuNodes;
use App\Models\Tag;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($menu_id = null)
    {
        $MenuLocations = MenuLocation::all();
        $menus = Menu::all();
        $categories = Category::orderBy('parent_id','ASC')->select('id','cat_name','slug')->get();
        $tags = Tag::orderBy('id','ASC')->select('id','name','slug')->get();
        $nodes = MenuNodes::where('menu_id',$menu_id)->where('parent_id', 0)->orderBy('position')->get();
        return view('backpanel.menu.index',compact('categories','tags','MenuLocations','menus','menu_id','nodes'));
    }

    public function create(Request $request)
    {
        return redirect()->route('admin.menu.index',$request->menu_select);
    }

    public function store(Request $request)
    {
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

    public function addToMenu(Request $request)
    {
        try {
            if(isset($request->menus)){
                $ids = [];
                foreach ($request->menus as $key => $value) {
                    $menuNode = new MenuNodes();
                    $menuNode->menu_id = $request->menus[$key]['menu_id'];
                    $menuNode->reference_id = $request->menus[$key]['reference_id'];
                    $menuNode->reference_type = $request->menus[$key]['reference_type'];    
                    $menuNode->title = $request->menus[$key]['title'];
                    switch ($request->menus[$key]['reference_type']) {
                        case 'App\Models\Category':
                            $menuNode->route_name = 'category-news';
                            break;
                        case 'App\Models\Tag':
                            $menuNode->route_name = 'tag-news';
                            break;
                        case 'App\Models\Page':
                            $menuNode->route_name = 'page';
                            break;
                        default:
                            $menuNode->route_name = NULL;
                            break;
                    }
                    $menuNode->position = MenuNodes::where('menu_id',$request->menus[$key]['menu_id'])->count() + 1;
                    $menuNode->save();
                    $ids[] .= $menuNode->id;
                }
                return view("backpanel.menu.menu-structure",["menu"=>MenuNodes::find($ids)]);
            }
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function addToMenuLink(Request $request)
    {
        try {
            $menuNode = new MenuNodes();
            $menuNode->menu_id = $request->menu_id;
            $menuNode->title = $request->title;
            $menuNode->route_name = "custom-link";
            $menuNode->url = $request->url;
            $menuNode->css = $request->css;
            $menuNode->icon = $request->icon;
            $menuNode->target = $request->target;
            $menuNode->position = MenuNodes::where('menu_id',$request->menu_id)->count() + 1;
            $menuNode->save();
            return view("backpanel.menu.menu-structure",["menu"=>MenuNodes::where('id',$menuNode->id)->get()]);
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function destroy(MenuNodes $menuNodes)
    {
        $menuNodes->delete();
        return response()->json(['success' => 'MenuNode deleted successfully!']);
    }
}
