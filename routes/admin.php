<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/check', function(){
    dd("working");
});

Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home')->middleware('user_type');


Route::controller(LoginController::class)->prefix('admin-login')->group(function () {
    Route::get('/', 'adminLogin')->name('admin.login');
    // Route::get('/orders/{id}', 'show');
    // Route::post('/orders', 'store');
});
