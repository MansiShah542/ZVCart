<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserHomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;


// Route::get('/home', function () {
//     return view('userhome/home');
// })->name('home');
Route::controller(UserHomeController::class)->group(function(){
    Route::get('/home','index')->name('home');
});


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
// Route::get('/admin', 'admin_')->name('admin.dashboard');
});
Route::get('/admin', function () {
    return view('admin/adminDashboard');
})->name('admin.dashboard');
