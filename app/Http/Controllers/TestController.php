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
        dd(convertYoutube('https://youtu.be/lyeyoqwXm5o'));
    }
}
