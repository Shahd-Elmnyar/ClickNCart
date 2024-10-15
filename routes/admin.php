<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\Admin\CategoryController as AdminCategoryController; // for Admin Categories

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
// routes/web.php
// Route::resource('categories', CategoryController::class)->middleware('auth');
// Route::resource('products', ProductController::class)->name('products.index');//->middleware('auth');
// Route::get('/admin/products', [ProductController::class])->name('products.index');



// Route::middleware('lang', 'admin')->group(function () {
//     Route::get('/', [HomeController::class, 'index']);
// });


// Admin Ctegories
// Route::prefix('admin')->group(function () {
//     Route::resource('categories', AdminCategoryController::class);
// });
