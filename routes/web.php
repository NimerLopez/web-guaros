<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', [ProductController::class, 'Home'])->name('products.home');
Route::get('/', [ProductController::class, 'Home'])->name('seguridad.index');