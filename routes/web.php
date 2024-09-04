<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;

use Illuminate\Support\Facades\Auth; // Import the Auth facade

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);
Route::resource('purchases', PurchaseController::class);
Route::resource('purchase_items', PurchaseItemController::class);
Route::resource('sales', SaleController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);

