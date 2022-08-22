<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WorldDataController;
use Illuminate\Support\Facades\Config;

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
// =============== Admin User Auth Routes ==============
require __DIR__.'/admin_auth.php';
require __DIR__.'/auth.php';

Route::any('/test',[TestController::class,'test'])->name('test');
Route::view('/', 'welcome');

Route::prefix('/frontend-on-development/news15india')->group(function(){
    Route::get('/', [FrontController::class,'home'])->name('home');
    Route::get('/news/category/{slug}',[FrontController::class,'categoryNews'])->name('category-news');
    Route::get('/news/tag/{slug?}',[FrontController::class,'tagNews'])->name('tag-news');
    Route::get('/page/{slug}',[FrontController::class,'pages'])->name('page');
    Route::get('/author/{user}', [FrontController::class,'author'])->name('author');
    Route::get('/news/{slug}',[FrontController::class,'singleNews'])->name('single-news');
    Route::view('reporter-form','reporter-form');
});
// =============== Country State City Routes ==============
Route::get('/countries',[WorldDataController::class,'countries'])->name('countries');
Route::get('/states/{country_id}',[WorldDataController::class,'states'])->name('states');
Route::get('/cities/{state_id}',[WorldDataController::class,'cities'])->name('cities');

// =============== Comments Routes ==============
$middleware = (Config::get('comments.guest_commenting') == true) ? ProtectAgainstSpam::class : 'auth';
Route::post('/comments', [Config::get('comments.controller') , 'store'])->middleware($middleware)->name('comments.store');
Route::delete('comments/{comment}', [Config::get('comments.controller') , 'destroy'])->middleware('auth')->name('comments.destroy');
Route::put('comments/{comment}', [Config::get('comments.controller') , 'update'])->middleware('auth')->name('comments.update');
Route::post('comments/{comment}', [Config::get('comments.controller') , 'reply'])->middleware('auth')->name('comments.reply');

// =============== User Panel Routes ==============
Route::view('/dashboard','dashboard')->middleware(['auth'])->name('dashboard');
Route::post('/follow',[FrontController::class,'follow'])->middleware(['auth'])->name('follow');

// ==================== Backpanel Panel Routes ==================
Route::get('/admin',function(){
    return redirect()->route('admin.dashboard');
});
Route::prefix('/backpanel')->name('admin.')->middleware(['admin'])->group(function(){
    Route::view('/dashboard', 'backpanel.dashboard')->name('dashboard');
    // ----------------[ Backpanel Panel Category Module Routes ]------------------------
    Route::prefix('/category')->name('category.')->group(function(){
        Route::get('/', [CategoryController::class,'index'])->middleware('permission:read-category')->name('index');
        Route::post('/store', [CategoryController::class,'store'])->middleware('permission:create-category')->name('store');
        Route::get('/{category}/edit',[CategoryController::class,'edit'])->middleware('permission:update-category')->name('edit');
        Route::get('/{category}/delete',[CategoryController::class,'destroy'])->middleware('permission:delete-category')->name('delete');
        Route::get('/getCategories', [CategoryController::class, 'show'])->middleware('permission:read-category')->name('getCategories');
    });
    // ----------------[ Backpanel Panel Media Module Routes ]------------------------
    Route::prefix('/media')->name('media.')->group(function(){
        Route::view('/', 'backpanel.media.media')->middleware('permission:read-media')->name('index');
        Route::post('/upload',[MediaController::class,'create'])->middleware('permission:create-media')->name('create');
        Route::post('/rename',[MediaController::class,'update'])->middleware('permission:update-media')->name('rename');
        Route::post('/download',[MediaController::class,'download'])->middleware('permission:update-media')->name('download');
        Route::any('/fetch-data',[MediaController::class,'fetch'])->middleware('permission:read-media')->name('fetch');
        Route::post('/delete/files',[MediaController::class,'destroy'])->middleware('permission:delete-media')->name('delete');
        Route::post('/bulk/delete', [MediaController::class, 'bulkDelete'])->middleware('permission:delete-media')->name('bulk.delete');
    });
    // ----------------[ Backpanel Panel News Module Routes ]------------------------
    Route::prefix('/news')->name('news.')->group(function(){
        Route::get('/create-news', [NewsController::class,'index'])->middleware('permission:create-news')->name('create');
        Route::post('/store-news', [NewsController::class,'store'])->middleware('permission:create-news')->name('store');
        Route::get('/ajax',[NewsController::class,'view_news'])->middleware('permission:read-news')->name('ajax-list');
        Route::get('/view-news', [NewsController::class,'show'])->middleware('permission:read-news')->name('view-all-news');
        Route::get('/edit/{id}',[NewsController::class,'edit'])->middleware('permission:update-news')->name('edit');
        Route::get('/trash/{id}',[NewsController::class,'trash'])->middleware('permission:delete-news')->name('delete');
        Route::get('/status/{id}', [NewsController::class, 'status'])->middleware('permission:update-news')->name('status');
        Route::get('/trash-news', [NewsController::class,'trashview'])->middleware('permission:trash-news')->name('trash-news');
        Route::get('/ajax-trash-news', [NewsController::class,'ajaxtrash'])->middleware('permission:trash-news')->name('ajax-trash-news');
        Route::get('/destroy/{id}',[NewsController::class,'destroy'])->middleware('permission:destroy-news')->name('destroy');
        Route::get('/restore/{id}',[NewsController::class,'restore'])->middleware('permission:restore-news')->name('restore');
    });
    // ----------------[ Backpanel Panel Comments Module Routes ]------------------------
    Route::prefix('/comment')->name('comment.')->group(function(){
        Route::get('/ajax/{approved}',[CommentController::class,'index'])->middleware('permission:read-comments')->name('ajax-comments');
        Route::get('/index', [CommentController::class,'show'])->middleware('permission:read-comments')->name('comments');
        Route::get('/unapproved', [CommentController::class,'unapproved'])->middleware('permission:read-comments')->name('unapproved');
        Route::get('/trash/{comment}',[CommentController::class,'trash'])->middleware('permission:delete-comments')->name('delete');
        Route::get('/approve/{id}/{approve_type}', [CommentController::class, 'status'])->middleware('permission:approve-comments')->name('is_approve');
        Route::get('/trash-comments', [CommentController::class,'trashview'])->middleware('permission:read-trash-comments')->name('trash');
        Route::get('/ajax-trash-comments', [CommentController::class,'ajaxtrash'])->middleware('permission:read-trash-comments')->name('ajax-trash-comments');
        Route::get('/destroy/{id}',[CommentController::class,'admin_destroy'])->middleware('permission:destroy-comments')->name('destroy');
        Route::get('/restore/{id}',[CommentController::class,'restore'])->middleware('permission:restore-comments')->name('restore');
    });
    // ----------------[ Backpanel Panel Tags Module Routes ]------------------------
    Route::prefix('/tag')->name('tag.')->group(function(){
        Route::get('/view',[TagController::class,'index'])->middleware('permission:read-tags')->name('index');
        Route::post('/store', [TagController::class,'store'])->middleware('permission:create-tags')->name('store');
        Route::get('/edit/{tag}',[TagController::class,'edit'])->middleware('permission:update-tags')->name('edit');
        Route::get('/delete/{tag}',[TagController::class,'destroy'])->middleware('permission:delete-tags')->name('delete');
        Route::get('/gettags', [TagController::class, 'show'])->middleware('permission:read-tags')->name('getTags');
    });
    // ----------------[ Backpanel Panel Users Module Routes ]------------------------
    Route::prefix('/users')->name('user.')->group(function(){
        Route::get('/index', [AdminController::class, 'index'])->middleware('permission:read-member')->name('index');
        Route::get('/block', [AdminController::class, 'show'])->middleware('permission:block-member')->name('block');
        Route::get('/create',[AdminController::class,'create'])->middleware('permission:create-member')->name('add');
        Route::post('/store', [AdminController::class,'store'])->middleware('permission:create-member')->name('store');
        Route::get('/edit/{id}',[AdminController::class,'edit'])->middleware('permission:update-member')->name('edit');
        Route::get('/block/{id}',[AdminController::class,'destroy'])->middleware('permission:delete-member')->name('delete');
        Route::get('/restore/{id}',[AdminController::class,'restore'])->middleware('permission:restore-member')->name('restore');
        Route::get('/force-delete/{id}',[AdminController::class,'forceDelete'])->middleware('permission:destroy-member')->name('forceDelete');
    });
    // ----------------[ Backpanel Panel Viewers Module Routes ]------------------------
    Route::prefix('/viewers')->name('viewer.')->group(function(){
        Route::get('/', [DashboardController::class, 'websiteViewers'])->middleware('permission:read-user')->name('index');
        Route::get('/blocked', [DashboardController::class, 'blockViewers'])->middleware('permission:block-user')->name('block');
        Route::get('/edit/{id}', [DashboardController::class, 'viewerEdit'])->middleware('permission:update-user')->name('edit');
        Route::get('/block/{id}', [DashboardController::class, 'viewerBlock'])->middleware('permission:delete-user')->name('delete');
        Route::get('/restore/{id}', [DashboardController::class, 'viewerRestore'])->middleware('permission:restore-user')->name('restore');
    });
    // ----------------[ Backpanel Panel Roles Module Routes ]------------------------
    Route::prefix('/role')->name('role.')->group(function(){
        Route::get('/show',[RoleController::class,'index'])->middleware('permission:read-role')->name('show');
        Route::get('/create',[RoleController::class,'create'])->middleware('permission:create-role')->name('add');
        Route::post('/store',[RoleController::class,'store'])->middleware('permission:create-role')->name('store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->middleware('permission:update-role')->name('edit');
        Route::get('/delete/{id}',[RoleController::class,'destroy'])->middleware('permission:delete-role')->name('delete');
    });
    // ----------------[ Backpanel Panel Permissions Module Routes ]------------------------
    Route::prefix('/permission')->name('permission.')->middleware('role:super-admin')->group(function(){
        Route::get('/show',[PermissionController::class,'index'])->middleware('permission:read-permission')->name('show');
        Route::get('/create',[PermissionController::class,'create'])->middleware('permission:create-permission')->name('add');
        Route::post('/store',[PermissionController::class,'store'])->middleware('permission:create-permission')->name('store');
        Route::get('/edit/{id}',[PermissionController::class,'edit'])->middleware('permission:update-permission')->name('edit');
        Route::get('/delete/{id}',[PermissionController::class,'destroy'])->middleware('permission:delete-permission')->name('delete');
    });
    // ----------------[ Backpanel Panel Menu Module Routes ]------------------------
    Route::prefix('/menu')->name('menu.')->group(function(){
        Route::get('/view/{menu_id?}',[MenuController::class,'index'])->middleware('permission:read-menu')->name('index');
        Route::post('/store', [MenuController::class,'store'])->middleware('permission:create-menu')->name('store');
        Route::post('/view/selected',[MenuController::class,'create'])->middleware('permission:create-menu')->name('select');
        Route::post('/location-store', [MenuController::class,'location_store'])->middleware('permission:create-menu')->name('location-store');
        Route::get('/delete/{menu_nodes}',[MenuController::class,'destroy'])->middleware('permission:delete-menu')->name('delete');
        Route::post('/add-to-menu', [MenuController::class,'addToMenu'])->middleware('permission:create-menu')->name('add-to-menu');
        Route::post('/add-to-menu-link', [MenuController::class,'addToMenuLink'])->middleware('permission:create-menu')->name('add-to-menu-link');
        Route::post('/save-menu-structure', [MenuController::class,'structure'])->middleware('permission:create-menu')->name('save-menu-structure');
    });
    // ----------------[ Backpanel Panel Settings Module Routes ]------------------------
    Route::prefix('/settings')->name('setting.')->middleware('role:super-admin')->group(function(){
        Route::get('/index',[SettingController::class,'index'])->name('index');
        Route::post('/store',[SettingController::class,'store'])->name('store');
        Route::post('/page-setting-store',[SettingController::class,'pageSettingStore'])->name('page-setting-store');
    });
});