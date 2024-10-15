<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\CartController;
// use App\Http\Controllers\website\HomeController;//uncommented
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\ThanksController;
use App\Http\Controllers\Admin\HomeController;//remove it
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;

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

Route::get('shop-single',[ShopController::class,'index']);
Route::get('cart',[CartController::class,'index']);
Route::get('',[HomeController::class,'index']);
Route::get('thankyou',[ThanksController::class,'index']);

///remove ///
// Route::middleware([])->group(function () {
//     Route::get('/', [HomeController::class, 'index'])->name('admin.index');
//     ;
// });
// routes/web.php


//////////////////////////Admin routes//////////////////////



// Admin routes
Route::prefix('admin')->group(function () {
    // Products route to list all products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Categories routes

    // Route to list all categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    // Route to display the form for creating a new category
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');

    // Route for deleting a category
    Route::delete('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Route to view soft-deleted categories
    Route::get('/categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');

    // Route for restoring a soft-deleted category by its ID
    Route::post('/categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');

    // Route for permanently deleting a category by its ID
    Route::delete('/categories/force-delete/{id}', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');

    // Route to display the form to edit a specific category
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

    // Route for updating a specific category
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

    // Resource route for categories (if you want to keep the resourceful routes as well)
    Route::resource('categories', CategoryController::class)->except(['index', 'create', 'edit', 'update']);


    // Products routes

    // Route to list all products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    // Route to display the form for creating a new product
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

    // Route for storing a new product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');

    // Route for deleting a product
    Route::delete('/products/destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Route to view soft-deleted products
    Route::get('/products/trashed', [ProductController::class, 'trashed'])->name('products.trashed');

    // Route for restoring a soft-deleted product by its ID
    Route::post('/products/restore/{id}', [ProductController::class, 'restore'])->name('products.restore');

    // Route for permanently deleting a product by its ID
    Route::delete('/products/force-delete/{id}', [ProductController::class, 'forceDelete'])->name('products.forceDelete');

    // Route to display the form to edit a specific product
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Resource route for products
    Route::resource('products', ProductController::class);

    // Route for updating a specific product (not used, as resource routes cover it)
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
});




/////////////////////////////Web Routes /////////////////////////
  //website routes
  Route::view('about', 'website.layout');
  Route::view('checkout','website.checkout');
//   Route::view('/shop-single', 'website.shop-single');
  Route::view('/cart','website.cart');
  Route::view('','website.index');
  Route::view('/thankyou', 'website.thankyou');
  Route::view('/contact', 'website.contact');
  Route::get('/shop', [ProductController::class, 'showProducts'])->name('shop');
  Route::get('/shop-single/{id}', [ProductController::class, 'showSingleProduct'])->name('shop.single');
