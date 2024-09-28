<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\webController;
use App\Http\Controllers\web\ajaxController;
use App\Http\Controllers\web\loginController;

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


Route::controller(webController::class)->group(function(){
    Route::get("index","index")->name("web.index");
    Route::get("cart","cart")->name("web/cart");
    Route::get("log","log")->name("web/log");
    Route::get("regist","regist")->name("web/regist");
});

Route::controller(ajaxController::class)->group(function(){
Route::post("add_to_cart","add_to_cart")->name("add_to_cart");
Route::delete("destroy_item","destroy_item")->name("destroy_item");
Route::get("search_pro","search_pro")->name("search_pro");
});

Route::controller(loginController::class)->group(function(){
    Route::post("regis","regis")->name("dataRegis");
    Route::post("dataCheck","dataCheck")->name("dataCheck");
    });

Route::get('/', function () {
    return view('welcome');
});
