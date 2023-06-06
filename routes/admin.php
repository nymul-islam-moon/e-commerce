<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;


Route::controller(LoginController::class)->prefix('admin-login')->group(function () {
    Route::get('/', 'adminLogin')->name('admin.login');
});

Route::prefix('admin')->group(function () {

    Route::controller(AdminController::class)->prefix('admin')->group(function () {
        Route::get('/home', 'admin')->name('admin.home');
        Route::get('/logout', 'logout')->name('admin.logout');
    });

});
