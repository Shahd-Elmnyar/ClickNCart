<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\LangController;
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\website\ThanksController;
use App\Http\Controllers\website\ContactController;
use App\Http\Controllers\website\ProductController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\WishlistController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

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
        // Route::view('/shop-single', 'website.shop-single');
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
                    Route::resource('products', AdminProductController::class);
                    Route::get('/products-trashed', [AdminProductController::class, 'trashed'])->name('products.trashed');
                    Route::post('/products/{id}/restore', [AdminProductController::class, 'restore'])->name('products.restore');
                    Route::delete('/products/{id}/force-delete', [AdminProductController::class, 'forceDelete'])->name('products.forceDelete');
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






