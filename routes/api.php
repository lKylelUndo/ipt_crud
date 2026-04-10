<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Category Routes
Route::post('/add-category', [CategoryController::class, 'store'])->name('add.category');

// Product Routes
Route::get('/get-all-products', [ProductController::class, 'index'])->name('get.products');
Route::post('/add-product', [ProductController::class, 'store'])->name('add.product');
Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('update.product');
Route::delete('/delete-product/{id}', [ProductController::class, 'destroy'])->name('delete.product');

