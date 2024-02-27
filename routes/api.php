<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AdminLoginController::class)->group(function () {
    Route::get('/admin/login', 'admin_login_view')->middleware('web')->name('admin.login.view');
    Route::post('/admin/login', 'admin_login')->middleware('web')->name('admin.login');
    Route::post('/admin/logout', 'admin_logout')->middleware('web')->name('admin.logout');
});

Route::controller(AuthController::class)->group(function () {
    Route::middleware(['web'])->group(function () {
        Route::get('/login', 'userlogin_view')->name('login.view');
        Route::post('/login', 'userlogin')->name('login');
        Route::get('/register', 'registerUser_view')->name('register.view');
        Route::post('/register', 'registerUser')->name('register');
        Route::post('/logout', 'logout')->name('logout');
    });
});
//->middleware('web')
// Route::controller(SellerController::class)->group(function () {
//     Route::group(['prefix' => 'seller'], function () {
//         Route::get('/login', 'seller_login_view')->middleware('web')->name('seller.login.view');
//         Route::post('/login', 'seller_login')->middleware('web')->name('seller.login');
//         Route::get('/register', 'seller_register_view')->middleware('web')->name('seller.register.view');
//         Route::post('/register', 'seller_register')->middleware('web')->name('seller.register');
//     });
// });

Route::controller(SellerController::class)->group(function () {
    Route::group(['prefix' => 'seller'], function () {
        Route::get('/login', 'seller_login_view')->middleware('web')->name('seller.login.view');
        Route::post('/login', 'seller_login')->middleware('web')->name('seller.login');
        Route::get('/register', 'seller_register_view')->middleware('web')->name('seller.register.view');
        Route::post('/register', 'seller_register')->middleware('web')->name('seller.register');
        Route::post('/logout', 'seller_logout')->name('seller.logout');
    });
});