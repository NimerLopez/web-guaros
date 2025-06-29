<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', [ProductController::class, 'Home'])->name('products.home');
Auth::routes();
Route::get('/home', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('auth');
Route::get('admin/categories', [DashboardController::class, 'categoriasList'])->name('categories.index')->middleware('auth');
Route::get('admin/products', [DashboardController::class, 'ProductosIndex'])->name('products.index')->middleware('auth');

Route::middleware(['web'])->group(function () {    
    Route::post('/categories', [DashboardController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [DashboardController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [DashboardController::class, 'destroy'])->name('categories.destroy');
});

Route::middleware(['web'])->group(function () {
    Route::post('/products', [DashboardController::class, 'storeProd'])->name('products.store');
    Route::put('/products/{product}', [DashboardController::class, 'updateProd'])->name('products.update');
    Route::delete('/products/{product}', [DashboardController::class, 'destroyProd'])->name('products.destroy');
});