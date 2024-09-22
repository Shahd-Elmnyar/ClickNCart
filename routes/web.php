<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\admin\HomeController as AdminHomeController;
use App\Http\Controllers\website\LangController;
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\website\ThanksController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\website\CheckoutController;
use App\Http\Controllers\website\ContactController;

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
        Route::view('/shop','website.shop');
        Route::view('/cart','website.cart');
        Route::view('','website.index');
        Route::view('/thankyou', 'website.thankyou');
        Route::view('/contact', 'website.contact');

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
            Route::prefix('admin')->group(function () {
                Route::view('','admin.index');
                Route::resource('categories', CategoryController::class);
                Route::get('/categories-trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
                Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
                Route::delete('/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
            });

});


