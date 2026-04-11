<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', fn() => redirect()->route('products.index'))->name('home');

Route::resource('categories', CategoryController::class)->only([
    'index', 'create', 'store'
]);

Route::resource('products', ProductController::class);
