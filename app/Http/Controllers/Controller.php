<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function nestedCategoryPath()
    {
        $categories = Category::where('status',1)->select('id','parent_id','cat_name','slug')->get();
        foreach ($categories as $key => $value) {
            $categories[$key]->bread = $this->getBreadcrumb($value->parent_id).$value->cat_name;
        }
        return $categories;
    }

    public function getBreadcrumb($parent_id,$breadcrumb = '')
    {
        $category = Category::select('id','parent_id','cat_name','slug')->find($parent_id);
        if ($category) {
            $breadcrumb .= $category->cat_name." / ".$this->getBreadcrumb($category->parent_id,$breadcrumb);
        }
        return $breadcrumb;
    }
  
}
