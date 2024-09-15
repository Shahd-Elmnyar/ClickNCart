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


Route::middleware('lang')->group(function () {
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

    Route::prefix('admin')->group(function () {
        Route::get('', [AdminHomeController::class, 'index']);
        Route::resource('categories', CategoryController::class);
    });
});

Route::get('/lang/set/{lang}', [LangController::class, 'set']);
