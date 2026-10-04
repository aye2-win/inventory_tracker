<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

// redirect home to products
Route::get('/', function () {
    return redirect()->route('products.index');
});

// product routes
Route::resource('products', ProductController::class);

// show stock management
Route::get('/stock', [StockController::class, 'index'])
    ->name('stock.index');

// record stock movement
Route::post('/stock', [StockController::class, 'store'])
    ->name('stock.store');