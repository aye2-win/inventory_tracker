<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

Route::get('/stock', [StockController::class, 'index'])
    ->name('stock.index');

Route::post('/stock', [StockController::class, 'store'])
    ->name('stock.store');