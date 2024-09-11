<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController; // for Admin Categories

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




Route::middleware('lang', 'admin')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});


// Admin Ctegories
Route::prefix('admin')->group(function () {
    Route::resource('categories', AdminCategoryController::class);
});
