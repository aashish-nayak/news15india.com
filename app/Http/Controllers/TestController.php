<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TestController extends Controller
{
    public function test()
    {
        $cat = Category::where('parent_id',NULL)->inRandomOrder()->first();
        $cat2 = $cat->children()->inRandomOrder()->first();
        $ids = [$cat->id];
        if(isset($cat2->id))
            $ids[] = $cat2->id;
        dd($ids);
    }
}
