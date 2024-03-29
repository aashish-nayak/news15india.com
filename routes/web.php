<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertCategoryController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\AdvertPlacementController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankTransferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VoteController;
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

// Route::any('/test',[TestController::class,'test'])->name('test');
// Route::view('/test/view','test')->name('test-view');

// Route::view('/', 'welcome');

Route::get('/', [FrontController::class,'home'])->name('home');
Route::get('/news/category/{slug}',[FrontController::class,'categoryNews'])->name('category-news');
Route::get('/news/tag/{slug?}',[FrontController::class,'tagNews'])->name('tag-news');
Route::get('/page/{slug}',[FrontController::class,'pages'])->name('page');
Route::get('/author/{user}', [FrontController::class,'author'])->name('author');
Route::get('/news/{slug}',[FrontController::class,'singleNews'])->name('single-news');
Route::get('/polls/{id?}',[FrontController::class,'poll'])->name('poll');
Route::get('/application-form',[ReporterController::class,'application_form'])->name('reporter-application-form');
Route::post('/application-form/store',[ReporterController::class,'storeApplication'])->name('reporter-application-store');
Route::get('/thank-you/{order_id?}',[FrontController::class,'thank_you'])->name('thank-you');
Route::get('/advert-redirect/{url}',[FrontController::class,'advert_redirect'])->name('advert.redirect');
Route::get('sitemap.xml',[FrontController::class,'sitemap'])->name('sitemap');
// =============== Country State City Routes ==============
Route::get('/location/countries',[WorldDataController::class,'countries'])->name('countries');
Route::get('/location/states/{country_id}',[WorldDataController::class,'states'])->name('states');
Route::get('/location/cities/{state_id}',[WorldDataController::class,'cities'])->name('cities');

// =============== Comments Routes ==============
$middleware = (Config::get('comments.guest_commenting') == true) ? ProtectAgainstSpam::class : 'auth';
Route::post('/comments', [Config::get('comments.controller') , 'store'])->middleware($middleware)->name('comments.store');
Route::delete('comments/{comment}', [Config::get('comments.controller') , 'destroy'])->middleware('auth')->name('comments.destroy');
Route::put('comments/{comment}', [Config::get('comments.controller') , 'update'])->middleware('auth')->name('comments.update');
Route::post('comments/{comment}', [Config::get('comments.controller') , 'reply'])->middleware('auth')->name('comments.reply');

// =============== User Panel Routes ==============
Route::get('/dashboard',function(){
    return redirect()->route('dashboard');
});
Route::get('/redirect/backpanel',[FrontController::class,'admin_login'])->middleware(['auth'])->name('redirect.dashboard');
Route::get('/profile',[FrontController::class,'dashboard'])->middleware(['auth'])->name('dashboard');
Route::post('/follow',[FrontController::class,'follow'])->middleware(['auth'])->name('follow');
Route::post('/vote/polls/{poll}',[VoteController::class,'vote'])->name('poll.vote');
Route::post('/profile/update',[FrontController::class,'profile'])->middleware(['auth'])->name('user.profile.update');
Route::post('/complaint/store',[ComplaintController::class,'store'])->middleware(['auth'])->name('user.complaint.store');
Route::post('/complaint/reply/store',[ComplaintController::class,'store_reply'])->middleware(['auth'])->name('user.complaint.store-reply');

// ==================== Backpanel Panel Routes ==================
// Route::get('/admin',function(){
//     return redirect()->route('admin.dashboard');
// });
Route::prefix('/backpanel')->name('admin.')->middleware(['admin'])->group(function(){
    Route::view('/dashboard', 'backpanel.dashboard')->name('dashboard');
    Route::post('/item/bulk/delete', [AdminController::class,'bulkDelete'])->name('bulk.delete');
    Route::post('/item/bulk/destroy', [AdminController::class,'bulkDestroy'])->name('bulk.destroy');
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
        Route::get('/', [NewsController::class,'show'])->middleware('permission:read-news')->name('view-all-news');
        Route::get('/create', [NewsController::class,'index'])->middleware('permission:create-news')->name('create');
        Route::post('/store-news', [NewsController::class,'store'])->middleware('permission:create-news')->name('store');
        Route::get('/edit/{id}',[NewsController::class,'edit'])->middleware('permission:update-news')->name('edit');
        Route::get('/trash/{id}',[NewsController::class,'trash'])->middleware('permission:delete-news')->name('delete');
        Route::get('/status/{id}', [NewsController::class, 'status'])->middleware('permission:update-news')->name('status');
        Route::get('/trash', [NewsController::class,'trashview'])->middleware('permission:trash-news')->name('trash-news');
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
        Route::get('/ajax-trash', [CommentController::class,'ajaxtrash'])->middleware('permission:read-trash-comments')->name('ajax-trash-comments');
        Route::get('/destroy/{id}',[CommentController::class,'admin_destroy'])->middleware('permission:destroy-comments')->name('destroy');
        Route::get('/restore/{id}',[CommentController::class,'restore'])->middleware('permission:restore-comments')->name('restore');
    });
    // ----------------[ Backpanel Panel Polls Module Routes ]------------------------
    Route::prefix('/polls')->name('poll.')->group(function(){
        Route::get('/', [PollController::class,'index'])->middleware('permission:read-polls')->name('index');
        Route::post('/', [PollController::class,'store'])->middleware('permission:create-polls')->name('store');
        Route::get('/view/{poll}', [PollController::class,'view'])->middleware('permission:read-polls')->name('view');
        Route::post('/update', [PollController::class,'update'])->middleware('permission:update-polls')->name('update');
        Route::delete('/{poll}', [PollController::class,'remove'])->middleware('permission:delete-polls')->name('remove');
        Route::get('/{poll}/users', [PollController::class,'users'])->middleware('permission:read-polls')->name('users');
        Route::patch('/{poll}/lock', [PollController::class,'lock'])->middleware('permission:read-polls')->name('lock');
        Route::patch('/{poll}/unlock', [PollController::class,'unlock'])->middleware('permission:read-polls')->name('unlock');
    });
    // ----------------[ Backpanel Panel Tags Module Routes ]------------------------
    Route::prefix('/tag')->name('tag.')->group(function(){
        Route::get('/view',[TagController::class,'index'])->middleware('permission:read-tags')->name('index');
        Route::post('/store', [TagController::class,'store'])->middleware('permission:create-tags')->name('store');
        Route::get('/edit/{tag}',[TagController::class,'edit'])->middleware('permission:update-tags')->name('edit');
        Route::get('/delete/{tag}',[TagController::class,'destroy'])->middleware('permission:delete-tags')->name('delete');
        Route::get('/gettags', [TagController::class, 'show'])->middleware('permission:read-tags')->name('getTags');
    });
    // ----------------[ Backpanel Panel Members Module Routes ]------------------------
    Route::prefix('/member')->name('user.')->group(function(){
        Route::get('/index', [AdminController::class, 'index'])->middleware('permission:read-member')->name('index');
        Route::get('/block', [AdminController::class, 'show'])->middleware('permission:block-member')->name('block');
        Route::get('/create',[AdminController::class,'create'])->middleware('permission:create-member')->name('add');
        Route::post('/store', [AdminController::class,'store'])->middleware('permission:create-member')->name('store');
        Route::get('/edit/{id}',[AdminController::class,'edit'])->middleware('permission:update-member')->name('edit');
        Route::get('/status/{id}', [AdminController::class, 'status'])->middleware('permission:update-member')->name('status');
        Route::get('/block/{id}',[AdminController::class,'destroy'])->middleware('permission:delete-member')->name('delete');
        Route::get('/restore/{id}',[AdminController::class,'restore'])->middleware('permission:restore-member')->name('restore');
        Route::get('/force-delete/{id}',[AdminController::class,'forceDelete'])->middleware('permission:destroy-member')->name('forceDelete');
    });
    // ----------------[ Backpanel Panel Reporter Form Module Routes ]------------------------
    Route::prefix('/reporters')->name('reporter.')->group(function(){
        Route::get('/', [ReporterController::class, 'show'])->middleware('permission:read-reporters')->name('index');
        Route::get('/view/{id}', [ReporterController::class, 'view'])->middleware('permission:read-reporters')->name('view');
        Route::post('/update', [ReporterController::class, 'update'])->middleware('permission:update-reporters')->name('update');
        Route::get('/approved/{reporter}', [ReporterController::class, 'approved'])->middleware('permission:approve-reporters')->name('approved');
    });
    // ----------------[ Backpanel Panel Complaint Form Module Routes ]------------------------
    Route::prefix('/complaints')->name('complaint.')->group(function(){
        Route::get('/', [ComplaintController::class, 'index'])->middleware('permission:read-complaints')->name('index');
        Route::get('/view/{complaint}', [ComplaintController::class, 'show'])->middleware('permission:read-complaints')->name('view');
        Route::post('/update', [ComplaintController::class, 'update'])->middleware('permission:update-complaints')->name('update');
        Route::get('/status', [ComplaintController::class, 'status'])->middleware('permission:approve-complaints')->name('status');
        Route::post('/store-reply', [ComplaintController::class, 'send_reply'])->middleware('permission:update-complaints')->name('store-reply');
    });
    // ----------------[ Backpanel Panel Viewers Module Routes ]------------------------
    Route::prefix('/viewers')->name('viewer.')->group(function(){
        Route::get('/', [DashboardController::class, 'websiteViewers'])->middleware('permission:read-user')->name('index');
        Route::get('/blocked', [DashboardController::class, 'blockViewers'])->middleware('permission:block-user')->name('block');
        Route::get('/details/{id}/{page?}', [DashboardController::class, 'details'])->middleware('permission:read-user')->name('view');
        Route::get('/block/{id}', [DashboardController::class, 'viewerBlock'])->middleware('permission:update-user')->name('delete');
        Route::get('/restore/{id}', [DashboardController::class, 'viewerRestore'])->middleware('permission:restore-user')->name('restore');
        Route::get('/destroy/{id}', [DashboardController::class, 'viewerDestroy'])->middleware('permission:delete-user')->name('destroy');
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
    // ----------------[ Backpanel Panel Page Module Routes ]------------------------
    Route::prefix('/page')->name('page.')->group(function(){
        Route::get('/',[PageController::class,'index'])->middleware('permission:read-page')->name('index');
        Route::get('/create',[PageController::class,'create'])->middleware('permission:create-page')->name('create');
        Route::post('/store',[PageController::class,'store'])->middleware('permission:create-page')->name('store');
        Route::get('/edit/{page}',[PageController::class,'edit'])->middleware('permission:update-page')->name('edit');
        Route::get('/status/{page}', [PageController::class, 'status'])->middleware('permission:update-page')->name('status');
        Route::get('/delete/{page}',[PageController::class,'destroy'])->middleware('permission:delete-page')->name('delete');
    });
    // ----------------[ Backpanel Panel Advertisement Module Routes ]------------------------
    Route::prefix('/advertisement')->name('advert.')->group(function(){
        Route::get('/',[AdvertController::class,'index'])->middleware('permission:read-advertisement')->name('index');
        Route::get('/create',[AdvertController::class,'create'])->middleware('permission:create-advertisement')->name('create');
        Route::post('/store',[AdvertController::class,'store'])->middleware('permission:create-advertisement')->name('store');
        Route::get('/edit/{advert}',[AdvertController::class,'edit'])->middleware('permission:edit-advertisement')->name('edit');
        Route::get('/delete/{advert}',[AdvertController::class,'destroy'])->middleware('permission:delete-advertisement')->name('delete');
        Route::get('/status/{advert}',[AdvertController::class,'status'])->middleware('permission:edit-advertisement')->name('status');

        Route::prefix('/categories')->name('categories.')->group(function(){
            Route::get('/',[AdvertCategoryController::class,'index'])->middleware('permission:read-advertisement-category')->name('index');
            Route::post('/store',[AdvertCategoryController::class,'store'])->middleware('permission:create-advertisement-category')->name('store');
            Route::get('/edit/{advert_category}',[AdvertCategoryController::class,'edit'])->middleware('permission:edit-advertisement-category')->name('edit');
            Route::get('/delete/{advert_category}',[AdvertCategoryController::class,'destroy'])->middleware('permission:delete-advertisement-category')->name('delete');
        });

        Route::prefix('/placements')->name('placements.')->middleware('role:super-admin')->group(function(){
            Route::get('/',[AdvertPlacementController::class,'index'])->name('index');
            Route::post('/store',[AdvertPlacementController::class,'store'])->name('store');
            Route::get('/edit/{advert_placement}',[AdvertPlacementController::class,'edit'])->name('edit');
            Route::get('/delete/{advert_placement}',[AdvertPlacementController::class,'destroy'])->name('delete');
        });
    });
    // ----------------[ Backpanel Panel Settings Module Routes ]------------------------
    Route::prefix('/settings')->name('setting.')->middleware('role:super-admin')->group(function(){
        Route::get('/index',[SettingController::class,'index'])->name('index');
        Route::post('/store',[SettingController::class,'store'])->name('store');
        Route::post('/page-setting-store',[SettingController::class,'pageSettingStore'])->name('page-setting-store');
    });
    // ----------------[ Backpanel Panel Chat Module Routes ]------------------------
    Route::prefix('/chats')->name('chat.')->group(function(){
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::get('/users', [MessageController::class, 'users'])->name('users');
        Route::get('/messages', [MessageController::class, 'messages'])->name('messages');
        Route::post('/messages', [MessageController::class, 'messageStore'])->name('message-store');
        Route::get('/contact-messages/{id}', [MessageController::class, 'contactMessages'])->name('contact-messages');
        Route::get('/read/{recevier}', [MessageController::class, 'read'])->name('read');
        Route::get('/user/fetch-unread/{sender}', [MessageController::class, 'fetchUnread'])->name('fetch.unread');
    });
    // ----------------[ Backpanel Panel E-mail Module Routes ]------------------------
    Route::prefix('/emailbox')->name('emailbox.')->group(function(){
        Route::get('/', [EmailController::class, 'index'])->name('index');
    });
    // ----------------[ Backpanel Panel Accounts Module Routes ]------------------------
    Route::prefix('/accounting')->name('account.')->group(function(){
        // ------------ [ Bank Accounts SubModule ] ------------
        Route::prefix('/bank-account')->controller(BankAccountController::class)->group(function(){
            Route::get('/', 'index')->name('banking');
            Route::get('/create','create')->name('banking.create');
            Route::post('/save','store')->name('banking.save');
            Route::get('/edit/{id}','edit')->name('banking.edit');
            Route::get('/delete/{id}','destroy')->name('banking.delete');
        });
        // ------------ [ Bank Transfer SubModule ] ------------
        Route::resource('/bank-transfer', BankTransferController::class);
        // -------------- [ Payments ] ---------------
        Route::get('/revenue',[AccountController::class,'payments'])->name('payments.index');
        Route::get('/revenue/{id}',[AccountController::class,'payment_view'])->name('payments.view');
        // -------------- [ Expenses ] ---------------
        Route::get('/expenses',[ExpenseController::class,'index'])->name('expenses.index');
        Route::get('/expenses/create',[ExpenseController::class,'create'])->name('expenses.create');
        Route::post('/expenses/store',[ExpenseController::class,'store'])->name('expenses.store');
        Route::post('/category/store',[ExpenseController::class,'categoryStore'])->name('category.store');
        Route::get('/expenses/{id}/edit',[ExpenseController::class,'edit'])->name('expenses.edit');
        Route::get('/expenses/{id}/destroy',[ExpenseController::class,'destroy'])->name('expenses.destroy');
        // -------------- [ Transactions ] ---------------
        Route::get('/transactions',[AccountController::class,'payments'])->name('transactions.index');
        Route::get('/transactions/{id}',[AccountController::class,'payment_view'])->name('transactions.view');
    });
});