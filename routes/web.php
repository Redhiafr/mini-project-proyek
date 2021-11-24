<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [CustomerController::class, 'index'])->name('home');
Route::get('shop', [CustomerController::class, 'shop'])->name('shop');
Route::get('shop/{id}', [CustomerController::class, 'filter'])->name('filter');
Route::get('/detail/{id}', [CustomerController::class, 'show'])->name('detail');
Route::middleware(['auth', 'customer'])->group(function () {
    Route::resource('histories', HistoryController::class);
    Route::resource('shoppingCarts', ShoppingCartController::class)->only('index', 'store');
    Route::post('shoppingCarts/update', [ShoppingCartController::class, 'update'])->name('shoppingCarts.update');
    Route::get('shoppingCarts/{shoppingCart}/destroy', [ShoppingCartController::class, 'destroy'])->name('shoppingCarts.destroy');
    Route::resource('order', OrderController::class)->only('create', 'store');
});

Auth::routes();

Route::middleware(['auth', 'administrator'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('products', ProductController::class);
    Route::resource('stores', StoreController::class)->only('index', 'store', 'update');
    Route::resource('transactions', TransactionController::class);
    Route::get('invoice/{id}', [TransactionController::class, 'invoice'])->name('invoice');
});

