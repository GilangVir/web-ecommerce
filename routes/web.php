<?php

use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function(){
        Route::resource('products', ProductController::class);
        Route::resource('product_orders', ProductOrderController::class);

        Route::get('/transactions', [ProductOrderController::class, 'transaction'])->name(name: 'product_orders.transaction');
        Route::get('/transactions/details/{productOrder}', [ProductOrderController::class, 'transaction_detail'])->name('product_orders.transaction.detail');

        Route::get('/download/file/{productOrder}', [ProductOrderController::class, 'downloadFile'])
        ->name('product_orders.download.file')->middleware('throttle: 1,1');
        // throttle: 1,1 : batasi 1 download per menit
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});

require __DIR__.'/auth.php';
