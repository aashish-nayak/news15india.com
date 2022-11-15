<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuLocation;
use App\Models\MenuNodes;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index($menu_id = null)
    {
        $MenuLocations = MenuLocation::all();
        $menus = Menu::all();
        $categories = Category::where('parent_id', NULL)->where('status', 1)->orderBy('id')->get();
        $tags = Tag::orderBy('id','ASC')->select('id','name','slug')->get();
        $pages = Page::where('status',1)->get();
        $nodes = MenuNodes::where('menu_id',$menu_id)->where('parent_id', 0)->orderBy('position')->get();
        return view('backpanel.menu.index',compact('categories','tags','pages','MenuLocations','menus','menu_id','nodes'));
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
                return view("backpanel.includes.menu-structure",["menu"=>MenuNodes::find($ids),'child'=>true]);
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
            return view("backpanel.includes.menu-structure",["menu"=>MenuNodes::where('id',$menuNode->id)->get(),'child'=>true]);
        } catch (\Exception $e) {
            return response()->json(['error'=>$e->getMessage()]);
        }
    }

    public function recursiveSave($structure, $parent = 0)
    {
        try {
            foreach ($structure as $key => $node) {
                $menu = MenuNodes::find($node->id);
                $menu->title = $node->title;
                $menu->url = ($node->customUrl != '') ? $node->customUrl : NULL;
                $menu->css = $node->class;
                $menu->target = $node->target;
                $menu->icon = $node->iconFont;
                $menu->position = $node->position;
                $menu->has_child = (count($node->children) > 0) ? 1 : 0;
                $menu->parent_id = $parent;
                $menu->save();
                if(count($node->children) > 0){
                    $this->recursiveSave($node->children,$node->id);
                }
            }
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function structure(Request $request)
    {
        $structure = json_decode($request->menu_nodes);
        $response = $this->recursiveSave($structure);
        if($response == true){
            $request->session()->flash('success', 'Menu Saved successfully!');
        }else{
            $request->session()->flash('error', $response);
        }
        return redirect()->back();
    }
    
    public function recursiveDeleteId($node)
    {
        $collection = collect();
        $childs = MenuNodes::where('parent_id',$node->id);
        $count = $childs->count();
        if($count > 0){
            foreach ($childs->get() as $key => $subnode) {
                $collection->push($subnode->id);
                $collection = $this->recursiveDeleteId($subnode)->merge($collection);
            }
        }
        return $collection;
    }
    public function destroy(MenuNodes $menuNodes)
    {
        $ids = $this->recursiveDeleteId($menuNodes)->toArray();
        foreach ($ids as $child) {
            MenuNodes::find($child)->delete();
        }
        $menuNodes->delete();
        return response()->json(['success' => 'Menus deleted successfully!']);
    }
}
