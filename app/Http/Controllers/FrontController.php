<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Advert;
use App\Models\Category;
use App\Models\News;
use App\Models\Page;
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
// ========== SEO Package ==========
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
// OR with multi
use Artesaos\SEOTools\Facades\JsonLdMulti;

// OR
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Str;
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
        SEOMeta::setTitle(setting('site_meta_title'));
        SEOMeta::setDescription(setting('site_meta_description'));
        SEOMeta::addKeyword(setting('site_meta_keyword'));

        TwitterCard::setTitle(setting('site_meta_title'));
        TwitterCard::setDescription(setting('site_meta_description'));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle(setting('site_meta_title'));
        OpenGraph::setDescription(setting('site_meta_description'));
        OpenGraph::setUrl(request()->url());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('locale', 'hi-in');
        OpenGraph::addProperty('locale:alternate', ['hi-in', 'en-us']);

        OpenGraph::addImage(setting('site_logo'));
        OpenGraph::addImage(['url' => setting('site_logo'), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle(setting('site_meta_title'));
        JsonLd::setDescription(setting('site_meta_description'));
        JsonLd::addImage(setting('site_logo'));

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
        ->whereHas('creator',function($query){
            if(isset($query->name)){
                return $query;
            }
        })
        ->where('slug',$newsUrl)
        ->where('status',1)
        ->where('is_published',1)
        ->where('is_verified',1)
        ->firstOrFail();

        SEOMeta::setTitle($news->meta_title ?? $news->title);
        SEOMeta::setDescription($news->meta_description ?? $news->short_description);
        SEOMeta::addMeta('article:published_time', $news->created_at->toW3CString(), 'property');
        SEOMeta::addMeta('article:section', $news->categories()->select('cat_name')->first()->cat_name, 'property');
        SEOMeta::addKeyword($news->meta_keywords);

        TwitterCard::setTitle($news->meta_title ?? $news->title);
        TwitterCard::setDescription($news->meta_description ?? $news->short_description);
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle($news->meta_title ?? $news->title);
        OpenGraph::setDescription($news->meta_description ?? $news->short_description);
        OpenGraph::setUrl(request()->url());
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addProperty('published_time', $news->created_at->toW3CString());
        OpenGraph::addProperty('modified_time', $news->updated_at->toW3CString());
        OpenGraph::addProperty('author', $news->creator->name);
        OpenGraph::addProperty('locale', 'hi-in');
        OpenGraph::addProperty('locale:alternate', ['hi-in', 'en-us']);

        OpenGraph::addImage(asset('storage/media/'.$news->newsImage->filename));
        OpenGraph::addImage(['url' => asset('storage/media/'.$news->newsImage->filename), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle($news->meta_title ?? $news->title);
        JsonLd::setDescription($news->meta_description ?? $news->short_description);
        JsonLd::setType('Article');
        JsonLd::addImage(asset('storage/media/'.$news->newsImage->filename));

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

        SEOMeta::setTitle($currentCategory->meta_title ?? $currentCategory->cat_name);
        SEOMeta::setDescription($currentCategory->meta_description ?? setting('site_meta_description'));
        SEOMeta::addKeyword($currentCategory->meta_keywords ?? setting('site_meta_keyword'));

        TwitterCard::setTitle($currentCategory->meta_title ?? $currentCategory->cat_name);
        TwitterCard::setDescription($currentCategory->meta_description ?? setting('site_meta_description'));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle($currentCategory->meta_title ?? $currentCategory->cat_name);
        OpenGraph::setDescription($currentCategory->meta_description ?? setting('site_meta_description'));
        OpenGraph::setUrl(request()->url());
        OpenGraph::addProperty('type', 'articles');
        OpenGraph::addProperty('published_time', $currentCategory->created_at->toW3CString());
        OpenGraph::addProperty('modified_time', $currentCategory->updated_at->toW3CString());
        OpenGraph::addProperty('locale', 'hi-in');
        OpenGraph::addProperty('locale:alternate', ['hi-in', 'en-us']);

        OpenGraph::addImage(asset('storage/media/'.$currentCategory->catImage->filename));
        OpenGraph::addImage(['url' => asset('storage/media/'.$currentCategory->catImage->filename), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle($currentCategory->meta_title ?? $currentCategory->cat_name);
        JsonLd::setDescription($currentCategory->meta_description ?? setting('site_meta_description'));
        JsonLd::setType('Articles');
        JsonLd::addImage(asset('storage/media/'.$currentCategory->catImage->filename));

        $parents = collect();
        if($currentCategory->parent_id != NULL){
            $parents = $this->treePerent($currentCategory->parent_id);
        }

        $categoryNews = News::whereHas('categories',function (Builder $query) use($slug,$pageSetting) {
            $query->where('slug',$slug);
        })->whereHas('creator',function($query){
            if(isset($query->name)){
                return $query;
            }
        })->with('newsImage','creator')->where('status',1)->where('is_published',1)->where('is_verified',1)->latest()->paginate($pageSetting->news_per_page);

        $catIds = $pageSetting->sidebars;

        $sidebar_1 = Category::with(['news'=>function($query) use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[0]);
        }])->find($catIds[0]);

        $sidebar_2 = Category::with(['news'=>function($query) use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[1])->with('newsImage');
        }])->find($catIds[1]);

        $sidebar_3 = Category::with(['news'=>function($query) use($pageSetting){
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
        
        SEOMeta::setTitle($currentTag->meta_title ?? $currentTag->name);
        SEOMeta::setDescription($currentTag->meta_description ?? setting('site_meta_description'));
        SEOMeta::addKeyword($currentTag->meta_keywords ?? setting('site_meta_keyword'));

        TwitterCard::setTitle($currentTag->meta_title ?? $currentTag->name);
        TwitterCard::setDescription($currentTag->meta_description ?? setting('site_meta_description'));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle($currentTag->meta_title ?? $currentTag->name);
        OpenGraph::setDescription($currentTag->meta_description ?? setting('site_meta_description'));
        OpenGraph::setUrl(request()->url());
        OpenGraph::addProperty('type', 'tags');
        OpenGraph::addProperty('published_time', $currentTag->created_at->toW3CString());
        OpenGraph::addProperty('modified_time', $currentTag->updated_at->toW3CString());
        OpenGraph::addProperty('locale', 'hi-in');
        OpenGraph::addProperty('locale:alternate', ['hi-in', 'en-us']);

        OpenGraph::addImage(asset('storage/media/'.$currentTag->tagImage->filename));
        OpenGraph::addImage(['url' => asset('storage/media/'.$currentTag->tagImage->filename), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle($currentTag->meta_title ?? $currentTag->name);
        JsonLd::setDescription($currentTag->meta_description ?? setting('site_meta_description'));
        JsonLd::setType('Tags');
        JsonLd::addImage(asset('storage/media/'.$currentTag->tagImage->filename));

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
        $page = Page::where('slug',$slug)->where('status',1)->firstOrFail();
        SEOMeta::setTitle($page->meta_title ?? $page->name);
        SEOMeta::setDescription($page->meta_description ?? Str::limit($page->content,200));
        SEOMeta::addMeta('page:published_time', $page->created_at->toW3CString(), 'property');
        SEOMeta::addKeyword($page->meta_keywords);

        TwitterCard::setTitle($page->meta_title ?? $page->name);
        TwitterCard::setDescription($page->meta_description ?? Str::limit($page->content,200));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle($page->meta_title ?? $page->name);
        OpenGraph::setDescription($page->meta_description ?? Str::limit($page->content,200));
        OpenGraph::setUrl(request()->url());
        OpenGraph::addProperty('type', 'page');
        OpenGraph::addProperty('published_time', $page->created_at->toW3CString());
        OpenGraph::addProperty('modified_time', $page->updated_at->toW3CString());
        OpenGraph::addProperty('author', $page->creator->name);
        OpenGraph::addProperty('locale', 'hi-in');
        OpenGraph::addProperty('locale:alternate', ['hi-in', 'en-us']);

        OpenGraph::addImage(asset('storage/media/'.$page->pageImage->filename));
        OpenGraph::addImage(['url' => asset('storage/media/'.$page->pageImage->filename), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle($page->meta_title ?? $page->name);
        JsonLd::setDescription($page->meta_description ?? Str::limit($page->content,200));
        JsonLd::setType('Page');
        JsonLd::addImage(asset('storage/media/'.$page->pageImage->filename));
        $page->viewsUp();
        $shareCurrent = Share::currentPage()
        ->facebook()
        ->twitter()
        ->whatsapp()
        ->linkedin()
        ->getRawLinks();
        
        $pageSetting = json_decode(setting('category_page_settings'));
        $catIds = $pageSetting->sidebars;
        $sidebar_1 = Category::with(['news'=>function($query) use($pageSetting){
            $query->latest()->limit($pageSetting->sidebars_limit[0])->with('newsImage');
        }])->find($catIds[0]);

        return view('page', compact('page','shareCurrent','sidebar_1'));
    }

    public function author($url)
    {
        $pageSetting = json_decode(setting('author_page_settings'));

        $author = Admin::whereHas('details',function($query) use($url){
            $query->where('url',$url);
        })->with('details')->firstOrFail();

        SEOMeta::setTitle($author->name);
        SEOMeta::setDescription($author->about ?? setting('site_meta_description') );
        SEOMeta::addKeyword(setting('site_meta_keyword'));

        TwitterCard::setTitle($author->name);
        TwitterCard::setDescription($author->about ?? setting('site_meta_description'));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle($author->name)
             ->setDescription($author->about ?? setting('site_meta_description'))
            ->setType('profile')
            ->setProfile([
                'first_name' => explode(' ',$author->name)[0],
                'last_name' => explode(' ',$author->name)[1] ?? '',
                'username' => $author->details->url,
            ]);

        OpenGraph::addImage($author->getAvatar());
        OpenGraph::addImage(['url' => $author->getAvatar(), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle($author->name);
        JsonLd::setDescription($author->about ?? setting('site_meta_description'));
        JsonLd::setType('Profile');
        JsonLd::addImage($author->getAvatar());

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

    public function like(Request $request)
    {
        try {
            $news = News::find($request->news_id);
            $isLike = $news->isLiked();
            return response()->json(['status'=>'success','is_liked'=>$isLike,'likes'=>kmb($news->getLikes())]);
        } catch (\Exception $e) {
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function poll($poll_id = '')
    {
        SEOMeta::setTitle(setting('site_meta_title'));
        SEOMeta::setDescription(setting('site_meta_description'));
        SEOMeta::addKeyword(setting('site_meta_keyword'));

        TwitterCard::setTitle(setting('site_meta_title'));
        TwitterCard::setDescription(setting('site_meta_description'));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle(setting('site_meta_title'));
        OpenGraph::setDescription(setting('site_meta_description'));
        OpenGraph::setUrl(request()->url());
        OpenGraph::addProperty('type', 'Surveys');
        OpenGraph::addProperty('locale', 'hi-in');
        OpenGraph::addProperty('locale:alternate', ['hi-in', 'en-us']);

        OpenGraph::addImage(setting('site_logo'));
        OpenGraph::addImage(['url' => setting('site_logo'), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle(setting('site_meta_title'));
        JsonLd::setDescription(setting('site_meta_description'));
        JsonLd::addImage(setting('site_logo'));

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
        $loggedUser = User::find(auth('web')->id());
        SEOMeta::setTitle('Profile - ' . $loggedUser->name);
        SEOMeta::setDescription($loggedUser->about ?? setting('site_meta_description'));
        SEOMeta::addKeyword(setting('site_meta_keyword'));

        TwitterCard::setTitle('Profile - ' . $loggedUser->name);
        TwitterCard::setDescription($loggedUser->about ?? setting('site_meta_description'));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle('Profile - ' . $loggedUser->name)
             ->setDescription($loggedUser->about ?? setting('site_meta_description'))
            ->setType('profile')
            ->setProfile([
                'first_name' => explode(' ', $loggedUser->name)[0],
                'last_name' => explode(' ', $loggedUser->name)[1] ?? '',
                'username' => $loggedUser->email,
            ]);

        OpenGraph::addImage($loggedUser->getAvatar());
        OpenGraph::addImage(['url' => $loggedUser->getAvatar(), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle('Profile - ' . $loggedUser->name);
        JsonLd::setDescription($loggedUser->about ?? setting('site_meta_description'));
        JsonLd::setType('Profile');
        JsonLd::addImage($loggedUser->getAvatar());

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
        SEOMeta::setTitle('Thank You');
        SEOMeta::setDescription(setting('site_meta_description'));
        SEOMeta::addKeyword(setting('site_meta_keyword'));

        TwitterCard::setTitle('Thank You');
        TwitterCard::setDescription(setting('site_meta_description'));
        TwitterCard::setUrl(request()->url());

        OpenGraph::setTitle('Thank You');
        OpenGraph::setDescription(setting('site_meta_description'));
        OpenGraph::setUrl(request()->url());
        OpenGraph::addProperty('type', 'thank-you-page');
        OpenGraph::addProperty('locale', 'hi-in');
        OpenGraph::addProperty('locale:alternate', ['hi-in', 'en-us']);

        OpenGraph::addImage(setting('site_logo'));
        OpenGraph::addImage(['url' => setting('site_logo'), 'size' => 300,'height' => 300, 'width' => 300]);

        JsonLd::setTitle('Thank You');
        JsonLd::setDescription(setting('site_meta_description'));
        JsonLd::addImage(setting('site_logo'));
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
