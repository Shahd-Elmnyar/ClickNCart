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
        Route::get('about', [AboutController::class , 'index']);
        Route::get('checkout',[CheckoutController::class, 'index']);
        Route::get('/shop-single', [ShopController::class, 'index']);
        Route::get('/cart', [CartController::class, 'index']);
        Route::get('', [HomeController::class, 'index']);
        Route::get('/thankyou', [ThanksController::class, 'index']);

    //authentications routes
        //register routes
            Route::get('/register', [AuthController::class, 'registerForm'])->middleware(["guest"]);
            Route::post('/register', [AuthController::class, 'register'])->middleware(["guest"]);

        //login routes
            Route::get('/login', [AuthController::class, 'loginForm'])->middleware(["guest"])->name('login');
            Route::post('/login', [AuthController::class, 'login'])->middleware(["guest"]);

        //logout route
            Route::get('/logout', [AuthController::class, 'logout'])->middleware(["auth"]);

            
            
            //admin routes
            Route::prefix('admin')->group(function () {
                Route::get('', [AdminHomeController::class, 'index']);
                Route::resource('categories', CategoryController::class);
                Route::get('/categories-trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
                Route::post('/categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
                Route::delete('/categories/{id}/force-delete', [CategoryController::class, 'forceDelete'])->name('categories.forceDelete');
            });

});


