<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    DashboardController as AdminDashboardController,
    ItemController as AdminItemController,
    CategoryController as AdminCategoryController,
    SupplierController as AdminSupplierController,
    TransactionController as AdminTransactionController
};
use App\Http\Controllers\User\{
    DashboardController as UserDashboardController,
};
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\ItemController;

// Redirect root to login
Route::redirect('/', '/login');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    // User Dashboard
    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    // User Items (Read Only)
    Route::resource('items', ItemController::class)
        ->only(['index', 'show']);

    // Activity Log
    Route::get('/activity', [ActivityLogController::class, 'index'])
        ->name('activity');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    // Resource Controllers
    Route::resources([
        '/items' => AdminItemController::class,
        '/categories' => AdminCategoryController::class,
        '/suppliers' => AdminSupplierController::class,
        '/transactions' => AdminTransactionController::class
    ]);
});

// Authentication Routes
require __DIR__ . '/auth.php';