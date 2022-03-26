<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin',function(){
    return redirect()->route('admin.dashboard');
});
Route::prefix('admin/')->name('admin.')->middleware('web')->group(function(){
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

    Route::view('news/create-news', 'backpanel.news.add-news')->name('news.create');
    Route::view('news/view-news', 'backpanel.news.view-news')->name('news.view-all-news');
    Route::view('news/trash-news', 'backpanel.news.trash-news')->name('news.trash-news');
});