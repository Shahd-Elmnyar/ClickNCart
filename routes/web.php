<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\website\CartController;
// use App\Http\Controllers\website\HomeController;//uncommented
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\website\ThanksController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\website\ProductController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\WishlistController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\HomeController;//remove it


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

//lang route
Route::get('/lang/set/{lang}', [LangController::class, 'set']);

Route::middleware('lang')->group(function () {

    //website routes
        Route::view('about', 'website.about');
        Route::view('checkout','website.checkout');
        Route::view('/shop-single', 'website.shop-single');
        Route::get('/product/{id}', [ProductController::class, 'show']);
        Route::view('/cart','website.cart');
        Route::view('','website.index');
        Route::get('',[HomeController::class, 'index']);
        Route::get('/showCategory/{id}', [HomeController::class, 'showCategory']);
        Route::view('/thankyou', 'website.thankyou');
        Route::view('/contact', 'website.contact');
        Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/update/{cartItem}', [CartController::class, 'updateQuantity'])->name('cart.update');
        Route::delete('/cart/remove/{cartItem}', [CartController::class, 'removeItem'])->name('cart.remove');
        Route::post('newsletter', NewsletterController::class);
        //shop route
        Route::resource('shops',ShopController::class);
        //wishlist route
        Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
        Route::post('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
        Route::post('wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');        //Contact-Mail route
        Route::post('/contact', [ContactController::class, 'contactFormSubmit'])->name('contact.submit');

    //authentications routes
        //register routes
            Route::view('/register', "auth.register")->middleware(["guest"]);
            Route::post('/register', [AuthController::class, 'register'])->middleware(["guest"]);

        //login routes
            Route::view('/login',"auth.login")->middleware(["guest"])->name('login');
            Route::post('/login', [AuthController::class, 'login'])->middleware(["guest"]);

        //logout route
            Route::get('/logout', [AuthController::class, 'logout'])->middleware(["auth"]);


            //admin routes
            Route::middleware('admin')->group(function () {
                Route::prefix('admin')->group(function () {
                    Route::view('','admin.index')->name('admin');
                    Route::view('/profile','admin.profile')->name('admin.profile');
                    Route::resource('categories', CategoryController::class);
                    Route::get('/categories-trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
                    Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
                    Route::delete('/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
                    Route::get('messages', [AdminContactController::class, 'index'])->name('admin.messages');

                    Route::middleware('superAdmin')->group(function () {
                        //user routes
                        Route::resource('users', UserController::class);
                        Route::get('/users-trashed', [UserController::class, 'trashed'])->name('users.trashed');
                        Route::post('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
                        Route::delete('/users/{id}/force-delete', [UserController::class, 'forceDelete'])->name('users.forceDelete');
                });
            });
        });


});






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
