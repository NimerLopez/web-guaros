<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Rutas públicas
Route::get('/', [ProductController::class, 'Home'])->name('products.home');
Route::get('/productos', [ProductController::class, 'index'])->name('productos.catalogo');
Route::get('/products/category/{slug?}', [ProductController::class, 'getByCategory'])->name('products.byCategory');

// API: Validación de stock (con rate limiting para evitar abuso)
Route::middleware(['throttle:60,1'])->group(function () {
    Route::post('/api/validate-stock', [ProductController::class, 'validateStock'])->name('api.validate-stock');
});

// Rutas de autenticación con rate limiting
Route::middleware(['throttle:5,1'])->group(function () {
    Auth::routes();
});

// Rutas de administración - protegidas con auth y admin middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');

    // Categorías
    Route::get('/categories', [DashboardController::class, 'categoriasList'])->name('categories.index');
    Route::post('/categories', [DashboardController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [DashboardController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [DashboardController::class, 'destroy'])->name('categories.destroy');

    // Productos
    Route::get('/products', [DashboardController::class, 'ProductosIndex'])->name('products.index');
    Route::post('/products', [DashboardController::class, 'storeProd'])->name('products.store');
    Route::put('/products/{product}', [DashboardController::class, 'updateProd'])->name('products.update');
    Route::delete('/products/{product}', [DashboardController::class, 'destroyProd'])->name('products.destroy');
});

// Mantener compatibilidad con la ruta anterior de /home
Route::get('/home', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'admin']);