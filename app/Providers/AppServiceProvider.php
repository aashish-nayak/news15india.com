<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Menu;
use App\Models\MenuLocation;
use App\Models\MenuNodes;
use App\Models\News;
use App\Models\Poll;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Jorenvh\Share\ShareFacade as Share;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected function includeBladeComponent()
    {
        Blade::include('vendor.comments.components.comments', 'comments');
    }

    protected function includeFollowComponent()
    {
        Blade::include('vendor.followable.follow', 'followable');
    }

    protected function includeSeoComponent()
    {
        Blade::include('vendor.seo.seo-meta', 'meta');
    }

    /**
     * Define permission defined in the config.
     */
    protected function definePermissions()
    {
        foreach(Config::get('comments.permissions', []) as $permission => $policy) {
            Gate::define($permission, $policy);
        }
    }
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path('public_html');
        });
        View::composer('layouts.backpanel.partials.sidebar',function($view){
            $unapproved_comments = Comment::where('approved',0)->count();
            $trash_comments = Comment::onlyTrashed()->count();
            return $view->with(compact('unapproved_comments','trash_comments'));
        });

        View::composer('layouts.frontend.partials.desktop-nav',function($view){
            $loc_id = MenuLocation::where('location','main-menu')->first()->id;
            // Main Menu 
            $menuNodes = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','main-menu');
            })->where('parent_id',0)->get();
            // Mega Menu 1
            $megaMenu1 = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','mega-menu-1');
            })->where('parent_id',0)->get();
            // Mega Menu 2
            $megaMenu2 = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','mega-menu-2');
            })->where('parent_id',0)->get();
            // Mega Menu 3
            $megaMenu3 = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','mega-menu-3');
            })->where('parent_id',0)->get();
            return $view->with(compact('menuNodes','megaMenu1','megaMenu2','megaMenu3'));
        });
        View::composer('layouts.frontend.partials.mobile-breaking',function($view){
            $breakingNews = News::where('is_published',1)->where('is_verified',1)->where('status',1)->where('is_featured',1)->inRandomOrder()->limit(10)->get();
            return $view->with(compact('breakingNews'));
        });
        View::composer('layouts.frontend.partials.desktop-breaking',function($view){
            $breakingNews = News::where('is_published',1)->where('is_verified',1)->where('status',1)->where('is_featured',1)->inRandomOrder()->first();
            return $view->with(compact('breakingNews'));
        });
        View::composer('layouts.frontend.partials.sidebar-nav',function($view){
            $loc_id = MenuLocation::where('location','sidebar-menu')->first()->id;
            $sideMenu = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','sidebar');
            })->where('parent_id',0)->get();
            return $view->with(compact('sideMenu'));
        });
        View::composer('layouts.frontend.partials.mobile-nav',function($view){
            $loc_id = MenuLocation::where('location','mobile-menu')->first()->id;
            $mobileMenu = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','mobile-menu');
            })->where('parent_id',0)->get();
            return $view->with(compact('mobileMenu'));
        });
        View::composer('layouts.frontend.partials.footer',function($view){
            $loc_id = MenuLocation::where('location','footer-menu')->first()->id;
            $footerMenu = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','footer');
            })->where('parent_id',0)->get();
            $bottomFooter = MenuNodes::whereHas('menu',function($query)use($loc_id){
                $query->where('menu_location_id',$loc_id)->where('slug','bottom-footer');
            })->where('parent_id',0)->get();
            return $view->with(compact('footerMenu','bottomFooter'));
        });

        View::composer('components.poll',function($view){
            $now = date('Y-m-d');
            $poll = Poll::whereDate('starts_at','<=',$now)->whereDate('ends_at','>=',$now)->orderBy('views')->first();
            return $view->with(compact('poll'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        
        Route::model('comment', Config::get('comments.model'));

        $this->includeBladeComponent();
        $this->includeFollowComponent();
        $this->includeSeoComponent();

        $this->definePermissions();
    }
}
