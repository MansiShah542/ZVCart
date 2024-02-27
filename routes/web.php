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


Route::group(['prefix' => 'admin', 'middleware' => ['adminauth']], function () {
    Route::controller(AdminLoginController::class)->group(function () {
        Route::get('/home', 'admin_home')->name('admin.dashboard');
        Route::get('/vendors', 'admin_vendors')->name('admin.vendors');
        Route::post('/approve/{seller}', 'vendor_approve')->name('admin.approve');
        Route::post('/disapprove/{seller}', 'vendor_disapprove')->name('admin.disapprove');
        Route::delete('/delete/{seller}', 'admin_seller_delete')->name('admin.seller.delete');
        Route::get('products/categories', 'product_categories_view')->name('categories.view');
    });
});
Route::group(['prefix' => 'seller'], function () {
    Route::controller(SellerController::class)->group(function () {
        Route::get('/home', 'seller_dash')->name('seller.dashboard');
        Route::get('/billing', 'seller_billing')->name('seller.billing');
        Route::get('/orders', 'seller_orders')->name('seller.orders');
    });
    Route::controller(SellerController::class)->group(function () {
        Route::get('/products', 'seller_products')->name('seller.products');
        Route::get('/products/add', 'products_add_view')->name('products.add.view');
        Route::post('/products/add', 'products_add')->name('products.add');
    });
});

// Route::controller(SellerController::class)->group(function () {
// Route::get('/seller/login', 'seller_login_view')->name('seller.login.view');
//     Route::post('/seller/login', 'seller_login')->name('seller.login');
// Route::get('/seller/register', 'seller_register_view')->name('seller.register.view');
//     Route::post('/seller/register', 'seller_register')->name('seller.register');
// });


