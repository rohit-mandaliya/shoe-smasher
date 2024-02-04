<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ShoeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::name('admin.')->middleware(['guest:admin'])->prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'loginPage'])->name('login-page-admin');
    Route::post('login', [AdminController::class, 'login'])->name('login-admin');
});

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('welcome', [AdminController::class, 'welcome'])->name('admin.welcome');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    //Shoes
    Route::post('shoes/change-status/{id}', [ShoeController::class, 'changeStatus'])->name('shoes.changeStatus');
    Route::resource('shoes', ShoeController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('orders', OrderController::class);
});
