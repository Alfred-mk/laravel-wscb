<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MerchantProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Admin specific routes 
Route::middleware('is_admin')->prefix('admin')->group(function() {
    Route::get('home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('suppliers', 'App\Http\Controllers\SupplierController');
    Route::resource('products', 'App\Http\Controllers\ProductController');
    Route::resource('merchants', 'App\Http\Controllers\UserController');
});

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\MerchantProductController::class, 'index'])->name('merchant.products');
Route::resource('orders', 'App\Http\Controllers\OrderController');
Route::get('/orders/add-product/{id}', [App\Http\Controllers\OrderController::class, 'addProduct'])->name('orders.addProduct');
Route::post('/orders/add-product', [App\Http\Controllers\OrderController::class, 'insertProduct'])->name('orders.insertProduct');

