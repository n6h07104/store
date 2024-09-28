<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\loginController;
use App\Http\Controllers\dashboard\logoutController;
use App\Http\Controllers\dashboard\admin\AdminController;
use App\Http\Controllers\dashboard\product\ProductController;

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
Route::group(["middleware"=>"AuthAdmin"],function(){
    Route::get("logout",[logoutController::class,"logout"])->name("admin/logout");
    Route::resource("admin",AdminController::class);
    Route::resource("product",ProductController::class);
});

Route::group(["middleware"=>"guest:admin"],function(){
Route::get("login",[loginController::class,"login"])->name("admin/login");
Route::post("loginCheck",[loginController::class,"loginCheck"])->name("admin/login/Check");
});
