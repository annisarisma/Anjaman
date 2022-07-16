<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

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

// main routes
Route::get('/', [HomeController::class, 'main']);

// user management (login regis)
Route::group(['middleware' => 'guest'], function() {
    Route::get('/user/register', [UserController::class, 'register']);
    Route::post('/user/register', [UserController::class, 'store']);
    Route::get('/user/login', [UserController::class, 'login'])->name('login');
    Route::post('/user/login', [UserController::class, 'authenticate']);
});

// user management (profile)
Route::group(['middleware' => 'auth'], function() {
    Route::post('/user/logout', [UserController::class, 'logout']);
    Route::get('/user/profile', [UserController::class, 'profile']);
    Route::get('/user/editaddress/{id}', [UserController::class, 'edit']);
    Route::post('/user/updateaddress/{id}', [UserController::class, 'update']);
    Route::post('/user/upload_image/{id}', [UserController::class, 'edit_profilepic']);
    Route::post('/user/addreviews/{id}', [UserController::class, 'review']);
});

// user management (krisar)
Route::group(['middleware' => 'auth'], function() {
    Route::post('/user/create_feedback', [HomeController::class, 'create_feedback']);
});

// market management
    Route::get('/find',[MarketController::class, 'find'])->name('web.find');
    Route::get('/user/market', [MarketController::class, 'show']);
    Route::get('/user/market/category=tas', [MarketController::class, 'show_tas']);
    Route::get('/user/market/category=keranjang', [MarketController::class, 'show_keranjang']);
    Route::get('/user/market/category=topi', [MarketController::class, 'show_topi']);
    Route::get('/user/market/category=pot', [MarketController::class, 'show_pot']);
    Route::get('/user/details/{id}', [MarketController::class, 'product']);

// cart management
Route::group(['middleware' => 'auth'], function() {
    Route::get('/cart/store/{id}', [CartController::class, 'store']);
    Route::get('/user/cart', [CartController::class, 'show']);
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy']); // cek session
    Route::post('/user/checkout', [CartController::class, 'checkout']);
    Route::get('/user/checkout/{product_id}/', [CartController::class, 'checkoutOne']);
});

// order management
Route::group(['middleware' => 'auth'], function() {
    Route::post('/order/store', [OrderController::class, 'store']);
    Route::get('/order/show/{status}', [OrderController::class, 'show']);
    Route::get('/order/pay/{id}', [OrderController::class, 'pay']); // cek session
    Route::get('/order/cancel/{id}', [OrderController::class, 'cancel']); // cek session
    Route::get('/order/confirm/{id}', [OrderController::class, 'confirm']); // cek session
    Route::get('/order/complaint/{id}', [OrderController::class, 'complaint']); // cek session
    Route::get('/order/apply_cancel_request/{id}', [OrderController::class, 'apply_cancel_request']); // cek session
    Route::get('/order/cancel_cancel_request/{id}', [OrderController::class, 'cancel_cancel_request']); // cek session
    Route::get('/order/accept_cancel_request/{id}', [OrderController::class, 'accept_cancel_request']); // cek session
    Route::get('/order/reject_cancel_request/{id}', [OrderController::class, 'reject_cancel_request']); // cek session
});

// our team
Route::group(['middleware' => ['auth']], function() {
    Route::get('/user/ourteam', [UserController::class, 'our_team_show']);
});


// admin management
Route::group(['middleware' => ['auth', 'admin']], function() {

    //dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'show']);

    //transaksi
    Route::get('/admin/transaksi', [AdminController::class, 'transaksi_show']);
    Route::get('/admin/detailtransaksi/{id}', [AdminController::class, 'detail']);
    Route::get('/admin/editstatus/{id}', [AdminController::class, 'transaksi_edit']);
    Route::post('/admin/updatestatus/{id}', [AdminController::class, 'transaksi_update']);
    Route::delete('/admin/deleteorder/{id}',  [AdminController::class, 'destroy_order']);

    //market
    Route::get('/admin/manage_market', [AdminController::class, 'managemarket_show']);
    Route::get('/admin/createmanagemarket', [AdminController::class, 'managemarket_create']);
    Route::post('/admin/createmanagemarket', [AdminController::class, 'managemarket_store']);
    Route::get('/admin/editmanagemarket/{id}', [AdminController::class, 'managemarket_edit']);
    Route::post('/admin/updatemanagemarket/{id}', [AdminController::class, 'managemarket_update']);
    Route::delete('/admin/deletemanagemarket/{id}',  [AdminController::class, 'managemarket_destroy']);

    //krisar
    Route::get('/admin/feedback', [AdminController::class, 'feedback']);

});