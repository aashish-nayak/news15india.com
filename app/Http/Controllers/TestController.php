<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Media;
use App\Models\News;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class TestController extends Controller
{
    public function test()
    {
        // dd(convertYoutube('https://youtu.be/lyeyoqwXm5o'));
        // $news = News::find(5);
        // $news->viewsUp();
        // dd($news->visitors()->toArray());
        // dd(User::find(1)->details);
        // $now = date('Y-m-d');
        // $poll = Poll::where('isClosed','=',NULL)->whereDate('starts_at','<=',$now)->whereDate('ends_at','>=',$now)->orderBy('views')->first();
        dd(auth('web')->check());
    }
}
