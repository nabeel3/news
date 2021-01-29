<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Models\Post;

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

Route::get('/',  [App\Http\Controllers\PostController::class, 'welcome'])->name('/');
     
Route::get('/contact', function () {
    return view('contactus');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/news', function () {
    return view('news');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/detail/{id}', [App\Http\Controllers\PostController::class, 'postDetail'])->name('detail');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


////resource controller
//Route::prefix('admin')->middleware(['auth','password.confirm'])->group(function () {
//
//
//    Route::view('/','dashboard.admin');
//
//Route::resource('posts', PostController::class);
//Route::resource('profiles', ProfileController::class);
//Route::resource('pages', PageController::class);
//Route::resource('categories', CategoryController::class);
//Route::resource('roles', RoleController::class);
//Route::resource('users', UserController::class);
//
//});

//Route::prefix('admin')->middleware(['auth','can:isAllow,"admin:subscriber"'])->group(function () {
//
//
//    Route::view('/','dashboard.admin');
//
//    Route::resource('posts', PostController::class);
//    Route::resource('profiles', ProfileController::class);
//    Route::resource('pages', PageController::class);
//    Route::resource('categories', CategoryController::class);
//    Route::resource('roles', RoleController::class);
//    Route::resource('users', UserController::class);
//
//});

Route::prefix('admin')->middleware(['auth'])->group(function () {


    Route::view('/','dashboard.admin');

    Route::resource('posts', PostController::class);
    Route::resource('profiles', ProfileController::class);
  
    Route::resource('categories', CategoryController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('tags', TagController::class);
    Route::resource('users', UserController::class);

});



//Route::prefix('admin')->middleware(['auth','can:isadmin'])->group(function () {
//
//
//    Route::view('/','dashboard.admin');
//
//    Route::resource('posts', PostController::class);
//    Route::resource('profiles', ProfileController::class);
//    Route::resource('pages', PageController::class);
//    Route::resource('categories', CategoryController::class);
//    Route::resource('roles', RoleController::class);
//    Route::resource('users', UserController::class);
//
//});



// Route::resource('profiles','ProfileController');
// Route::resource('users','UserController');
// Route::resource('users', UserController::class);

// Route::get('/users', [UserController::class, 'index']);

// Route::resource('pages','PageController');
// Route::resource('categories','CategoryController');
// Route::resource('roles','RoleController');