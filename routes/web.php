<?php

use App\Http\Controllers\Admin\AdminContoller;
use App\Http\Controllers\Admin\AdminCrudController;
use App\Http\Controllers\Admin\DashboardSettingController;
use App\Http\Controllers\Admin\ImagePostController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagsPostController;
use App\Http\Controllers\Admin\WebSiteSettingController;
use App\Http\Controllers\Admin\WriterAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\CommentController;
use App\Http\Controllers\Website\SiteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::controller(AdminContoller::class)->group(function ()
{
    Route::get('/dashboard','getDashboard')->middleware(['auth:writer,web', 'verified'])->name('getDashboard');
});

Route::resource('categories',CategoryController::class);
//Route::Post('categories/delete',[CategoryController::class,'delete'])->name('categories.delete');
Route::Get('categories/status/{id}',[CategoryController::class,'status'])->name('categories.status');
Route::resource('sub-categories',SubCategoryController::class);
Route::resource('tags',TagController::class);
Route::resource('admins',AdminCrudController::class);
Route::resource('writers',WriterController::class);
Route::resource('dashboard-settings',DashboardSettingController::class);
Route::resource('website-settings',WebSiteSettingController::class);
Route::resource('posts',PostController::class);
Route::resource('images-post',ImagePostController::class);
Route::resource('tags-post',TagsPostController::class);
Route::controller(SiteController::class)->group(function (){
    Route::get('/home','home')->name('home');
    Route::get('/MainCategory/{id}','mainCategory')->name('mainCategory');
    Route::get('/SubCategory/{id}','subCategory')->name('subCategory');
    Route::get('/SinglePost/{id}','SinglePost')->name('SinglePost');
});
Route::resource('comments',CommentController::class);


//Route::group(
//    [
//        'prefix' => (new Mcamara\LaravelLocalization\LaravelLocalization)->setLocale(),
//        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
//    ],
//    function()
//    {
//
//        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//        Route::get('/', function()
//        {
//            return View::make('hello');
//        });
//
//        Route::get('test',function(){
//            return View::make('test');
//        });
//    });





//
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
