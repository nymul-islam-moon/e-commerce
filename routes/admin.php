<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;


Route::controller(LoginController::class)->prefix('admin-login')->group(function () {
    Route::get('/', 'adminLogin')->name('admin.login');
});

Route::prefix('admin')->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/home', 'admin')->name('admin.home');
        Route::get('/logout', 'logout')->name('admin.logout');
    });

    Route::controller(ProductCategoryController::class)->prefix('product-category')->group( function (){
        Route::get('/', 'index')->name('product.category.index');
        Route::post('/store', 'store')->name('product.category.store');
        Route::get('/{productCategory}/edit', 'edit')->name('product.category.edit');
        Route::put('/{productCategory}/update', 'update')->name('product.category.update');
        Route::get('/{productCategory}/destroy', 'destroy')->name('product.category.destroy');
        // Route::get('/category/{ids}', 'destroyall')->name('product.category.destroyall');
    });

});
