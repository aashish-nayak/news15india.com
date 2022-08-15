<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
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
        $pageSetting = json_decode(setting('single_page_settings'));

        $news = News::with(['categories'=>function($query){
            $query->orderBy('parent_id','ASC');
        },'creator','tags','newsImage'])
        ->where('slug',$newsUrl)
        ->where('status',1)
        ->where('is_published',1)
        ->where('is_verified',1)
        ->firstOrFail();
        
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
}
