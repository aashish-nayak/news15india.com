<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\MenuLocation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path('public_html');
        });

        View::composer('layouts.frontend.partials.desktop-nav',function($view){
            $loc_id = MenuLocation::where('location','main-menu')->first()->id;
            $menu = Menu::with('parentMenuNodes')->where('menu_location_id',$loc_id)->first();
            return $view->with(compact('menu'));
        });
        View::composer('layouts.frontend.partials.sidebar-nav',function($view){
            $loc_id = MenuLocation::where('location','sidebar-menu')->first()->id;
            $sideMenu = Menu::with('parentMenuNodes')->where('menu_location_id',$loc_id)->first();
            return $view->with(compact('sideMenu'));
        });
        View::composer('layouts.frontend.partials.mobile-nav',function($view){
            $loc_id = MenuLocation::where('location','mobile-menu')->first()->id;
            $mobileMenu = Menu::with('parentMenuNodes')->where('menu_location_id',$loc_id)->first();
            return $view->with(compact('mobileMenu'));
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
    }
}
