<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

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

Route::view('/', 'welcome');

Route::view('/dashboard','dashboard')->middleware(['auth'])->name('dashboard');

require __DIR__.'/admin_auth.php';
require __DIR__.'/auth.php';

Route::get('/admin',function(){
    return redirect()->route('admin.dashboard');
});
Route::prefix('/backpanel')->name('admin.')->middleware(['admin'])->group(function(){
    Route::view('/dashboard', 'backpanel.dashboard')->name('dashboard');

    Route::prefix('/category')->name('category.')->middleware(['role:admin'])->group(function(){
        Route::get('/', [CategoryController::class,'index'])->name('index');
        Route::post('/store', [CategoryController::class,'store'])->name('store');
        Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('edit');
        Route::get('/{category}/delete',[CategoryController::class,'destroy'])->name('delete');
        Route::get('/getCategories', [CategoryController::class, 'show'])->name('getCategories');
    });
    Route::post('/media/upload',[MediaController::class,'create'])->name('media.create');
    Route::post('/media/update',[MediaController::class,'update'])->name('media.update');
    Route::get('/media',[MediaController::class,'index'])->name('media');
    Route::get('/media/fetch-data',[MediaController::class,'fetch'])->name('media.fetch');
    Route::get('/media/delete/{id}',[MediaController::class,'destroy'])->name('media.delete');
    Route::post('media/bulk/delete', [MediaController::class, 'bulkDelete'])->name('media.bulk.delete');

    Route::get('/pages/media/fetch-data',[NewsController::class,'fetch_media'])->name('pages.media');
    Route::get('news/create-news', [NewsController::class,'index'])->name('news.create');
    Route::post('news/store-news', [NewsController::class,'store'])->name('news.store');
    Route::get('news/ajax',[NewsController::class,'view_news'])->name('news.ajax-list');
    Route::get('news/view-news', [NewsController::class,'show'])->name('news.view-all-news');
    Route::get('news/edit/{id}',[NewsController::class,'edit'])->name('news.edit');
    Route::get('news/trash/{id}',[NewsController::class,'trash'])->name('news.delete');
    Route::get('news/status/{id}', [NewsController::class, 'status'])->name('news.status');
    Route::get('news/trash-news', [NewsController::class,'trashview'])->name('news.trash-news');
    Route::get('news/ajax-trash-news', [NewsController::class,'ajaxtrash'])->name('news.ajax-trash-news');
    Route::get('news/destroy/{id}',[NewsController::class,'destroy'])->name('news.destroy');
    Route::get('news/restore/{id}',[NewsController::class,'restore'])->name('news.restore');

    Route::get('tag/view',[TagController::class,'index'])->name('tag.index');
    Route::post('tag/store', [TagController::class,'store'])->name('tag.store');
    Route::get('tag/{tag}/edit',[TagController::class,'edit'])->name('tag.edit');
    Route::get('tag/{tag}/delete',[TagController::class,'destroy'])->name('tag.delete');
    Route::get('/gettags', [TagController::class, 'show'])->name('getTags');
    
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

    Route::get('/viewers', [DashboardController::class, 'websiteViewers'])->name('viewer.index');
    Route::get('/viewers/blocked', [DashboardController::class, 'blockViewers'])->name('viewer.block');
    Route::get('/viewers/edit/{id}', [DashboardController::class, 'viewerEdit'])->name('viewer.edit');
    Route::get('/viewers/block/{id}', [DashboardController::class, 'viewerBlock'])->name('viewer.delete');
    Route::get('/viewers/restore/{id}', [DashboardController::class, 'viewerRestore'])->name('viewer.restore');

    Route::prefix('/role')->name('role.')->middleware(['role:admin'])->group(function(){
        Route::get('/show',[RoleController::class,'index'])->name('show');
        Route::get('/create',[RoleController::class,'create'])->name('add');
        Route::post('/store',[RoleController::class,'store'])->name('store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('edit');
        Route::get('/delete{id}',[RoleController::class,'destroy'])->name('delete');
    });
    Route::prefix('/permission')->name('permission.')->middleware(['role:admin'])->group(function(){
        Route::get('/show',[PermissionController::class,'index'])->name('show');
        Route::get('/create',[PermissionController::class,'create'])->name('add');
        Route::post('/store',[PermissionController::class,'store'])->name('store');
        Route::get('/edit/{id}',[PermissionController::class,'edit'])->name('edit');
        Route::get('/delete{id}',[PermissionController::class,'destroy'])->name('delete');
    });
});