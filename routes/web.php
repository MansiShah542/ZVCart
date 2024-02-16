<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::controller(UserHomeController::class)->group(function(){
    Route::get('/home','index')->name('home');
});

Route::get('/admin', function () {
    return view('admin/adminDashboard');
})->name('admin.dashboard');

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','userlogin_view')->name('login.view');
    Route::post('/login','userlogin')->name('login');
    Route::get('/register','registerUser_view')->name('register.view');
    Route::post('/register','registerUser')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(AdminLoginController::class)->group(function(){
    Route::get('/admin/login', 'admin_login_view')->name('admin.login.view');
    Route::post('/admin/login', 'admin_login')->name('admin.login');
    Route::post('/logout', 'admin_logout')->name('admin.logout');
});
Route::controller(SellerController::class)->group(function(){
    Route::get('/seller/login', 'seller_login_view')->name('seller.login.view');
    Route::post('/seller/login', 'seller_login')->name('seller.login');
    Route::get('/seller/register', 'seller_register_view')->name('seller.register.view');
});

// Route::get('/seller/login', function () {
//     return view('seller/sloginlayout');
// })->name('seller.login');

