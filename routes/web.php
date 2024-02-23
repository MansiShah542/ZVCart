<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::controller(UserHomeController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
});

Route::get('/seller', function () {
    return view('seller/sellerDashboard');
})->name('seller.dashboard');

Route::group(['prefix' => 'admin', 'middleware' => ['adminauth']], function () {
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('/home', 'admin_home')->name('admin.dashboard');
        Route::get('/vendors', 'admin_vendors')->name('admin.vendors');
        Route::post('/approve/{seller}', 'vendor_approve')->name('admin.approve');
        Route::post('/disapprove/{seller}', 'vendor_disapprove')->name('admin.disapprove');
        Route::delete('/delete/{seller}', 'admin_seller_delete')->name('admin.seller.delete');
    });
});
// Route::controller(SellerController::class)->group(function () {
//     Route::get('/seller/login', 'seller_login_view')->name('seller.login.view');
//     Route::post('/seller/login', 'seller_login')->name('seller.login');
//     Route::get('/seller/register', 'seller_register_view')->name('seller.register.view');
//     Route::post('/seller/register', 'seller_register')->name('seller.register');
// });


