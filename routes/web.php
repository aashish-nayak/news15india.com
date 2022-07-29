<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::any('/test',[TestController::class,'test'])->name('test');

Route::view('/', 'welcome');
Route::prefix('/frontend-on-development/news15india')->group(function(){
    Route::get('/', [FrontController::class,'home'])->name('home');
    Route::get('/news/{category}',[FrontController::class,'categoryNews'])->name('category-news');
    Route::view('/3', 'author')->name('author');
    Route::get('/news/{url}',[FrontController::class,'singleNews'])->name('single-news');
});

Route::view('/dashboard','dashboard')->middleware(['auth'])->name('dashboard');

require __DIR__.'/admin_auth.php';
require __DIR__.'/auth.php';

Route::get('/admin',function(){
    return redirect()->route('admin.dashboard');
});
Route::prefix('/backpanel')->name('admin.')->middleware(['admin'])->group(function(){
    Route::view('/dashboard', 'backpanel.dashboard')->name('dashboard');

    Route::prefix('/category')->name('category.')->group(function(){
        Route::get('/', [CategoryController::class,'index'])->name('index');
        Route::post('/store', [CategoryController::class,'store'])->name('store');
        Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('edit');
        Route::get('/{category}/delete',[CategoryController::class,'destroy'])->name('delete');
        Route::get('/getCategories', [CategoryController::class, 'show'])->name('getCategories');
    });

    Route::prefix('/media')->name('media.')->group(function(){
        Route::get('/',[MediaController::class,'index'])->name('index');
        Route::post('/upload',[MediaController::class,'create'])->name('create');
        Route::post('/update',[MediaController::class,'update'])->name('update');
        Route::get('/fetch-data',[MediaController::class,'fetch'])->name('fetch');
        Route::get('/delete/{id}',[MediaController::class,'destroy'])->name('delete');
        Route::post('/bulk/delete', [MediaController::class, 'bulkDelete'])->name('bulk.delete');
    });

    Route::get('/pages/media/fetch-data',[NewsController::class,'fetch_media'])->name('pages.media');
    Route::prefix('/news')->name('news.')->group(function(){
        Route::get('/create-news', [NewsController::class,'index'])->name('create');
        Route::post('/store-news', [NewsController::class,'store'])->name('store');
        Route::get('/ajax',[NewsController::class,'view_news'])->name('ajax-list');
        Route::get('/view-news', [NewsController::class,'show'])->name('view-all-news');
        Route::get('/edit/{id}',[NewsController::class,'edit'])->name('edit');
        Route::get('/trash/{id}',[NewsController::class,'trash'])->name('delete');
        Route::get('/status/{id}', [NewsController::class, 'status'])->name('status');
        Route::get('/trash-news', [NewsController::class,'trashview'])->name('trash-news');
        Route::get('/ajax-trash-news', [NewsController::class,'ajaxtrash'])->name('ajax-trash-news');
        Route::get('/destroy/{id}',[NewsController::class,'destroy'])->name('destroy');
        Route::get('/restore/{id}',[NewsController::class,'restore'])->name('restore');
    });
    
    Route::prefix('/tag')->name('tag.')->group(function(){
        Route::get('/view',[TagController::class,'index'])->name('index');
        Route::post('/store', [TagController::class,'store'])->name('store');
        Route::get('/edit/{tag}',[TagController::class,'edit'])->name('edit');
        Route::get('/delete/{tag}',[TagController::class,'destroy'])->name('delete');
        Route::get('/gettags', [TagController::class, 'show'])->name('getTags');
    });

    Route::prefix('/users')->name('user.')->group(function(){
        Route::get('/index', [AdminController::class, 'index'])->name('index');
        Route::get('/block', [AdminController::class, 'show'])->name('block');
        Route::get('/create',[AdminController::class,'create'])->name('add');
        Route::post('/store', [AdminController::class,'store'])->name('store');
        Route::get('/edit/{id}',[AdminController::class,'edit'])->name('edit');
        Route::get('/block/{id}',[AdminController::class,'destroy'])->name('delete');
        Route::get('/restore/{id}',[AdminController::class,'restore'])->name('restore');
        Route::get('/force-delete/{id}',[AdminController::class,'forceDelete'])->name('forceDelete');
    });
    
    Route::prefix('/viewers')->name('viewer.')->group(function(){
        Route::get('/', [DashboardController::class, 'websiteViewers'])->name('index');
        Route::get('/blocked', [DashboardController::class, 'blockViewers'])->name('block');
        Route::get('/edit/{id}', [DashboardController::class, 'viewerEdit'])->name('edit');
        Route::get('/block/{id}', [DashboardController::class, 'viewerBlock'])->name('delete');
        Route::get('/restore/{id}', [DashboardController::class, 'viewerRestore'])->name('restore');
    });

    Route::prefix('/role')->name('role.')->group(function(){
        Route::get('/show',[RoleController::class,'index'])->name('show');
        Route::get('/create',[RoleController::class,'create'])->name('add');
        Route::post('/store',[RoleController::class,'store'])->name('store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit');
        Route::get('/delete/{id}',[RoleController::class,'destroy'])->name('delete');
    });

    Route::prefix('/permission')->name('permission.')->middleware('role:super-admin')->group(function(){
        Route::get('/show',[PermissionController::class,'index'])->name('show');
        Route::get('/create',[PermissionController::class,'create'])->name('add');
        Route::post('/store',[PermissionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
        Route::get('/delete/{id}',[PermissionController::class,'destroy'])->name('delete');
    });

    Route::prefix('/menu')->name('menu.')->group(function(){

        Route::get('/view/{menu_id?}',[MenuController::class,'index'])->name('index');
        Route::post('/store', [MenuController::class,'store'])->name('store');
        Route::post('/view/selected',[MenuController::class,'create'])->name('select');
        Route::post('/location-store', [MenuController::class,'location_store'])->name('location-store');
        Route::get('/delete/{menu_nodes}',[MenuController::class,'destroy'])->name('delete');
        Route::get('/structure-fetch/{menu_id}',[MenuController::class,'structureFetch'])->name('structure-fetch');
        Route::post('/add-to-menu', [MenuController::class,'addToMenu'])->name('add-to-menu');
    });
});