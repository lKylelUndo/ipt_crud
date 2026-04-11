<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Categories UI routes
Route::get('/categories/home', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create-form', [CategoryController::class, 'create'])->name('categories.create');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

// Categories Endpoints
Route::post('/categories/add', [CategoryController::class, 'store'])->name('categories.store');

// Products UI routes
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create-form', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/view/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');

// Products Endpoints
Route::post('/products/add', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/update/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
