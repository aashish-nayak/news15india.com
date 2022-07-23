<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TestController extends Controller
{
    public function test()
    {
        return Media::imageSave(Str::random(10),'test/');
    }
}
