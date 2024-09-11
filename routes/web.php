<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\website\CartController;
// use App\Http\Controllers\website\HomeController;//uncommented
use App\Http\Controllers\website\ShopController;
use App\Http\Controllers\website\ThanksController;
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

Route::get('shop-single',[ShopController::class,'index']);
Route::get('cart',[CartController::class,'index']);
Route::get('',[HomeController::class,'index']);
Route::get('thankyou',[ThanksController::class,'index']);

///remove ///
Route::middleware([])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    ;
});
