<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\CartController;
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\ThanksController;



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

//authentications routes
//register routes

Route::get('/register', [AuthController::class, 'registerForm'])->middleware(["guest"]);
Route::post('/register', [AuthController::class, 'register'])->middleware(["guest"]);

//login routes

Route::get('/login', [AuthController::class, 'loginForm'])->middleware(["guest"])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware(["guest"]);

//logout route

Route::get('/logout', [AuthController::class, 'logout'])->middleware(["auth"]);


Route::middleware([])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    ;
});
