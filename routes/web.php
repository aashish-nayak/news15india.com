<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::get('/admin',function(){
    return redirect()->route('admin.dashboard');
});
Route::prefix('admin/')->name('admin.')->middleware('auth')->group(function(){
    Route::view('dashboard', 'backpanel.dashboard')->name('dashboard');

    Route::get('category', [CategoryController::class,'index'])->name('category.index');
    Route::post('category/store', [CategoryController::class,'store'])->name('category.store');
    Route::get('category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::get('category/{category}/delete',[CategoryController::class,'destroy'])->name('category.delete');
    Route::get('/getCategories', [CategoryController::class, 'show'])->name('getCategories');

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
});