<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin',function(){
    return redirect()->route('admin.dashboard');
});
Route::prefix('admin/')->name('admin.')->middleware('web')->group(function(){
    Route::view('dashboard', 'backpanel.dashboard')->name('dashboard');
    Route::resource('category',CategoryController::class);
});