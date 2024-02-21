<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AuthController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(AdminLoginController::class)->group(function(){
Route::get('/admin/login', 'admin_login_view')->middleware('web')->name('admin.login.view');
Route::post('/admin/login', 'admin_login')->middleware('web')->name('admin.login');
Route::post('/admin/logout', 'admin_logout')->middleware('web')->name('admin.logout');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','userlogin_view')->middleware('web')->name('login.view');
    Route::post('/login','userlogin')->middleware('web')->name('login');
    Route::get('/register','registerUser_view')->middleware('web')->name('register.view');
    Route::post('/register','registerUser')->middleware('web')->name('register');
    Route::post('/logout', 'logout')->middleware('web')->name('logout');
});