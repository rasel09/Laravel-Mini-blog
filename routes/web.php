<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CategoryContorller;

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

Route::get('/', [FrontendController::class, 'index']);

// ------------------------------ single post Route ----------------------------
Route::get('post/{id}', [FrontendController::class, 'singlePost'])->name('singlePost');
// ----------------------------------- category post Route ---------------------------------------
Route::get('category/post/{id}', [FrontendController::class, 'categoryPost'])->name('categoryPost');

// ------------------------------------------ Search post Route ---------------------------------------
Route::post('post/search', [FrontendController::class, 'search'])->name('searchPost');

// ------------------------------ Slider Route ------------------------------
// Route::get('slider/{id}', [FrontendController::class, 'sliderShow']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ----------------------------------------------- Admin  Route ------------------------------------

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

//  -------------------------------- Category Route --------------------------------

Route::get('admin/categories', [CategoryContorller::class, 'index'])->name('categories.index');
Route::get('admin/categories/create', [CategoryContorller::class, 'create'])->name('categories.create');
Route::post('admin/categories/store', [CategoryContorller::class, 'store'])->name('categories.store');
Route::get('admin/categories/edit/{id}', [CategoryContorller::class, 'edit'])->name('categories.edit');
Route::put('admin/categories/update/{id}', [CategoryContorller::class, 'update'])->name('categories.update');
Route::delete('admin/categories/delete/{id}', [CategoryContorller::class, 'destroy'])->name('categories.destroy');

//--------------------------------- Post Route -----------------------------------------------

Route::get('all/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/update/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/delete/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//  -------------------------------------- Slider Image Route --------------------------------------

Route::get('all/slider', [SliderController::class, 'index'])->name('slider.index');
Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
Route::post('slider/store', [SliderController::class, 'store'])->name('slider.store');
Route::get('slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::put('slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');
Route::delete('slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');