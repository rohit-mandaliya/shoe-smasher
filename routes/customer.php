<?php

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Models\Shoe;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $shoes = Shoe::where('is_active', 1)->get();
    return view('customer.index', compact('shoes'));
})->name('customer_index');

Route::name('customer.')->middleware(['guest_customer:customer'])->group(function () {

    Route::get('register', [CustomerController::class, 'create'])->name('create');
    Route::post('registerCustomer', [CustomerController::class, 'register'])->name('register');
    Route::get('login', [CustomerController::class, 'loginPage'])->name('login-page-customer');
    Route::post('login', [CustomerController::class, 'login'])->name('login-customer');
});

Route::name('customer.')->middleware(['auth_customer:customer'])->group(function () {
    Route::get('product_show/{id}', [CustomerController::class, 'productShow'])->name('productShow');
    Route::post('add-to-cart', [CustomerController::class, 'addToCart'])->name('addToCart');
    Route::get('remove-cart/{id}', [CustomerController::class, 'removeFromCart'])->name('removeFromCart');
    Route::get('addToCart', [CustomerController::class, 'addToCartPage'])->name('addToCartPage');
    Route::get('address', [CustomerController::class, 'getAddressPage'])->name('address');
    Route::post('save-address', [CustomerController::class, 'storeAddress'])->name('storeAddress');
    Route::post('buy-now', [CustomerController::class, 'buyNow'])->name('buyNow');
    Route::get('buyNow', [CustomerController::class, 'addToCartBuyNow'])->name('addToCartBuyNow');
    Route::post('order-confirmed', [CustomerController::class, 'orderConfirmed'])->name('orderConfirmed');
    Route::post('order-confirm', [CustomerController::class, 'orderConfirmedCart'])->name('orderConfirmedCart');
    Route::get('thank-you', [CustomerController::class, 'thankYouPage'])->name('thankYouPage');

    Route::get('logout', [CustomerController::class, 'logout'])->name('logout-customer');
});
Route::get('collections', [CustomerController::class, 'collection'])->name('customer.collection');

Route::resource('/dashboard', DashboardController::class);
