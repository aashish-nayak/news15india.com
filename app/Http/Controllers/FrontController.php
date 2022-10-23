<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Advert;
use App\Models\Category;
use App\Models\News;
use App\Models\Poll;
use App\Models\Reporter;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Jorenvh\Share\ShareFacade as Share;
class FrontController extends Controller
{
    protected function treePerent($id){
        $collection = collect();
        $category = Category::find($id);
        $collection->push($category);
        if($category->parent_id != NULL){
            $collection = $this->treePerent($category->parent_id)->merge($collection);
        }
        return $collection;
    }

    protected function treeChilds($id){
        $collection = collect();
        Category::where('parent_id',$id)->get()->each(function($category)use($collection){
            $collection->push($category);
            if($category->children->count() > 0){
                $collection = $this->treeChilds($category->id)->merge($collection);
            }
        });
        return $collection;
    }

    public function home()
    {
        $homeSections = json_decode(setting('home_page_settings'));
        $catIds = $homeSections->sections;
        $catIdsLimit = $homeSections->sections_limit;

        $sideCatIds = $homeSections->sidebars;
        $sideCatIdsLimit = $homeSections->sidebars_limit;
        
        // Main Section Popular News 
        $popularNews = Category::with(['news'=>function($query){
            $query->inRandomOrder()->limit(15)->with('newsImage');
        }])->inRandomOrder()->first();

        // ............ Sections Queries ............ 
        $section1 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[0])->with('newsImage');
        }])->find($catIds[0]);
        $section2 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[1])->with('newsImage');
        }])->find($catIds[1]);
        $section3 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[2])->with('newsImage');
        }])->find($catIds[2]);
        $section4 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[3])->with('newsImage');
        }])->find($catIds[3]);
        $section5 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[4])->with('newsImage');
        }])->find($catIds[4]);
        $section6 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[5])->with('newsImage');
        }])->find($catIds[5]);
        $section7 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[6])->with('newsImage');
        }])->find($catIds[6]);
        $section8 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[7])->with('newsImage');
        }])->find($catIds[7]);
        $section9 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[8])->with('newsImage');
        }])->find($catIds[8]);
        $section10 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[9])->with('newsImage');
        }])->find($catIds[9]);
        $section10_part2 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[10])->with('newsImage');
        }])->find($catIds[10]);
        $section10_part3 = Category::with(['children'=>function($query){
            $query->limit(10);
        },'news'=>function($query)use($catIdsLimit){
            $query->latest()->limit($catIdsLimit[11])->with('newsImage');
        }])->find($catIds[11]);
        // .......... Sidebar Queries ............ 
        $sidebar_1 = Category::with(['news'=>function($query)use($sideCatIdsLimit){
            $query->latest()->limit($sideCatIdsLimit[0]);
        }])->find($sideCatIds[0]);
        $sidebar_2 = Category::with(['news'=>function($query)use($sideCatIdsLimit){
            $query->latest()->limit($sideCatIdsLimit[1])->with('newsImage');
        }])->find($sideCatIds[1]);
        $sidebar_3 = Category::with(['news'=>function($query)use($sideCatIdsLimit){
            $query->latest()->limit($sideCatIdsLimit[2]);
        }])->find($sideCatIds[2]);
        $sidebar_4 = Category::with(['news'=>function($query)use($sideCatIdsLimit){
            $query->latest()->limit($sideCatIdsLimit[3])->with('newsImage');
        }])->find($sideCatIds[3]);
        $sidebar_5 = Category::with(['news'=>function($query)use($sideCatIdsLimit){
            // ->where('format','video')
            $query->latest()->limit($sideCatIdsLimit[4])->with('newsImage');
        }])->find($sideCatIds[4]);
        return view('home',compact(
            'popularNews',
            'section1',
            'section2',
            'section3',
            'section4',
            'section5',
            'section6',
            'section7',
            'section8',
            'section9',
            'section10',
            'section10_part2',
            'section10_part3',
            'sidebar_1',
            'sidebar_2',
            'sidebar_3',
            'sidebar_4',
            'sidebar_5'
        ));
    }

    public function singleNews($newsUrl)
    {
        if(Session::get('redirect_to')){
            Session::forget('redirect_to');
        }
        $pageSetting = json_decode(setting('single_page_settings'));

        $news = News::with(['categories'=>function($query){
            $query->orderBy('parent_id','ASC');
        },'creator','tags','newsImage'])
        ->where('slug',$newsUrl)
        ->where('status',1)
        ->where('is_published',1)
        ->where('is_verified',1)
        ->firstOrFail();
        $news->viewsUp();
        $moreCategoryNews = Category::with(['news'=>function($query)use($newsUrl,$pageSetting){
            $query->where('slug','!=',$newsUrl)->latest()->limit($pageSetting->category_news_limit)->with('newsImage');
        },
        'children'=>function($query){
            $query->limit(10);
        }
        ])->find($news->categories->first()->id);

        $related = News::where('id','!=',$news->id)
        ->whereHas('tags', function (Builder $query) use($news){
            $query->whereIn('tags.id',$news->tags->pluck('id')->toArray());
        })
        ->with('newsImage')
        ->latest()->limit($pageSetting->related_news_limit)->get();
        // ....... Sidebar ..........
        $catIds = $pageSetting->sidebars;

        $sidebar_1 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[0]);
        }])->find($catIds[0]);

        $sidebar_2 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[1])->with('newsImage');
        }])->find($catIds[1]);

        $sidebar_3 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[2]);
        }])->find($catIds[2]);

        $sidebar_4 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[3])->with('newsImage');
        }])->find($catIds[3]);

        $bottom_section = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->bottom_section_limit)->with('newsImage');
        }])->find($pageSetting->bottom_section);

        $shareCurrent = Share::currentPage()
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->getRawLinks();

        return view('single',compact(
            'news',
            'moreCategoryNews',
            'related',
            'sidebar_1',
            'sidebar_2',
            'sidebar_3',
            'sidebar_4',
            'shareCurrent',
            'bottom_section'
        ));
    }

    public function categoryNews($slug)
    {
        $pageSetting = json_decode(setting('category_page_settings'));

        $currentCategory = Category::where('slug',$slug)->firstOrFail();
        $parents = collect();
        if($currentCategory->parent_id != NULL){
            $parents = $this->treePerent($currentCategory->parent_id);
        }

        $categoryNews = News::whereHas('categories',function (Builder $query) use($slug,$pageSetting) {
            $query->where('slug',$slug);
        })->with('newsImage','creator')->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->paginate($pageSetting->news_per_page);

        $catIds = $pageSetting->sidebars;

        $sidebar_1 = Category::with(['news'=>function($query) use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[0]);
        }])->find($catIds[0]);

        $sidebar_2 = Category::with(['news'=>function($query) use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars[1])->with('newsImage');
        }])->find($catIds[1]);

        $sidebar_3 = Category::with(['news'=>function($query) use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars[2]);
        }])->find($catIds[2]);

        $bottom_section = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->bottom_section_limit)->with('newsImage');
        }])->find($pageSetting->bottom_section);

        $shareCurrent = Share::currentPage()
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->getRawLinks();
        return view('category',compact(
            'categoryNews',
            'currentCategory',
            'parents',
            'sidebar_1',
            'sidebar_2',
            'sidebar_3',
            'bottom_section',
            'shareCurrent'
        ));
    }
    
    public function tagNews($slug = '')
    {
        $pageSetting = json_decode(setting('tag_page_settings'));

        $currentTag = Tag::query();
        if($slug != ''){
            $currentTag = $currentTag->where('slug', $slug)->firstOrFail();
        }else{
            $currentTag = $currentTag->inRandomOrder()->firstOrFail();
        }
        $tagNews = $currentTag->news()->latest()->paginate($pageSetting->news_per_page);
        
        $catIds = $pageSetting->sidebars;
        $sidebar_1 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[0]);
        }])->find($catIds[0]);

        $sidebar_2 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[1])->with('newsImage');
        }])->find($catIds[1]);

        $sidebar_3 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[2]);
        }])->find($catIds[2]);

        $bottom_section = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->bottom_section_limit)->with('newsImage');
        }])->find($pageSetting->bottom_section);
        $shareCurrent = Share::currentPage()
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->getRawLinks();
        return view('tag',compact(
            'tagNews',
            'currentTag',
            'sidebar_1',
            'sidebar_2',
            'sidebar_3',
            'bottom_section',
            'shareCurrent'
        ));
    }
    
    public function pages($slug)
    {
        //
    }

    public function author($url)
    {
        $pageSetting = json_decode(setting('author_page_settings'));

        $author = Admin::whereHas('details',function($query) use($url){
            $query->where('url',$url);
        })->with('details')->firstOrFail();

        $creatorNews = News::where('admin_id',$author->id)->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->paginate($pageSetting->news_per_page);

        $popularCategoryId = $pageSetting->section;
        $popularCategory = Category::with(['news'=>function($query)use($author,$pageSetting){
            $query->where('admin_id',$author->id)->latest()->limit($pageSetting->section_limit);
        }])->find($popularCategoryId);
        
        $shareCurrent = Share::currentPage()
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->getRawLinks();

        $catIds = $pageSetting->sidebars;
        $sidebar_1 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[0]);
        }])->find($catIds[0]);

        $sidebar_2 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[1])->with('newsImage');
        }])->find($catIds[1]);

        $sidebar_3 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[2]);
        }])->find($catIds[2]);

        $sidebar_4 = Category::with(['news'=>function($query)use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[3])->with('newsImage');
        }])->find($catIds[3]);

        return view('author',compact(
            'creatorNews',
            'author',
            'popularCategory',
            'sidebar_1',
            'sidebar_2',
            'sidebar_3',
            'sidebar_4',
            'shareCurrent'
        ));
    }

    public function customLink($slug = '')
    {
        return url($slug);
    }

    public function follow(Request $request)
    {
        try {
            $creator = Admin::find($request->creator_id);
            $user = User::find(auth('web')->user()->id);
            $user->toggleFollow($creator);
            return response()->json(['status'=>'success','is_follower'=>$creator->isFollowedBy($user)]);
        } catch (\Exception $e) {
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function poll($poll_id = '')
    {
        $now = date('Y-m-d');
        $polls = Poll::query();
        if($poll_id != ''){
            $polls->where('id',$poll_id);
        }
        $polls = $polls->whereDate('starts_at','<=',$now)->whereDate('ends_at','>=',$now)->get();
        return view('poll',compact('polls'));
    }

    public function dashboard()
    {
        $submitted = false;
        $data = Reporter::where('user_id',auth('web')->user()->id);
        if (auth('web')->check() && $data->count() > 0) {
            $submitted = true;
        }
        $data = $data->first();
        $surveys = User::find(auth('web')->id())->options()->latest()->with('poll')->get();
        return view('dashboard',compact('submitted','data','surveys'));
    }

    public function admin_login()
    {
        if(auth('web')->check()){
            $log = Reporter::where('user_id',auth('web')->user()->id)->first();
            if(!empty($log) && $log->admin->status != 0){
                if(auth('admin')->check() == false){
                    Auth::guard('admin')->login($log->admin);
                }
                return redirect()->route('admin.dashboard');
            }
        }
        return redirect()->route('dashboard')->with('error','Not Authrized User');
    }

    public function profile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required','integer'],
            'pincode' => ['integer'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
        ]);
        User::find(auth('web')->user()->id)->update(['name'=>$request->name]);
        $details = UserDetail::where('user_id',auth('web')->user()->id)->first();
        if($details == null){
            $details = new UserDetail();
            $details->user_id = auth('web')->user()->id;
        }
        if($request->hasFile('avatar')){
            if(Storage::exists('public/users-avatar/'.$details->avatar)){
                Storage::delete('public/users-avatar/'.$details->avatar);
            }
            $file = $request->file('avatar');
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename =  auth('web')->user()->name . '_' . $filename . '_' . time() . '.' . $extension;
            $file->storeAs('public/users-avatar', $filename);
            $details->avatar = $filename;
        }
        $details->phone_number = $request->phone_number;
        $details->whatsapp_number = $request->whatsapp_number;
        $details->gender = $request->gender;
        $details->address = $request->address;
        $details->zip = $request->zip;
        $details->country_id = $request->country;
        $details->state_id = $request->state;
        $details->city_id = $request->city;
        $details->save();
        return redirect()->back();
    }

    public function thank_you($transaction_id = null)
    {
        return view('thank-you',compact('transaction_id'));
    }
    
    public function advert_redirect($slug)
    {
        $ad = Advert::where('slug',$slug)->first();
        $ad->plusClicks();
        return redirect($ad->ad_redirect);
    }

    public function sitemap()
    {
        $cats = Category::where('status', 1)->orderBy('id','desc')->get();
        $tags = Tag::where('status', 1)->orderBy('id','desc')->get();
        $news = News::where('status', 1)->orderBy('id','desc')->get();
        $authors = Admin::where('status',1)->orderBy('id','desc')->get();
        return response()->view('sitemap', compact('cats','news','tags','authors'))->header('Content-Type', 'text/xml');
    }
}
