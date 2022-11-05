<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return view('login');
});

Route::view("sign_up", "sign_up");


Route::post("login", [UserController::class, 'login']);
Route::post("sign_up", [UserController::class, 'sign_up']);
Route::get("/", [ProductController::class, 'index']);
Route::post("/", [ProductController::class, 'getFilterdProducts']);
Route::get("detail/{id}", [ProductController::class, 'detail']);
Route::post("add_to_cart", [ProductController::class, 'addToCart']);
Route::get("listcart", [ProductController::class, 'list']);
Route::get("remove/{id}", [ProductController::class, 'remove']);
Route::get("ordernow", [ProductController::class, 'orderNow']);
Route::post("order_address", [ProductController::class, 'orderAddress']);
Route::get("myorders", [ProductController::class, 'myOrders']);
