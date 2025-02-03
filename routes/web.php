<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Superadmin\AuthController as SuperAdminAuthController;
use App\Http\Controllers\Superadmin\Dashboard as SuperadminDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->as('superadmin.')->group(function () {
    Route::get('/login', [SuperAdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SuperAdminAuthController::class, 'login']);
    Route::post('/logout', [SuperAdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:superadmin')->group(function () {
        Route::get('/', [SuperadminDashboard::class, 'index'])->name('dashboard');
        Route::prefix('admins')->name('admins.')->group(function () {
            // List all admins
            Route::get('/', [AdminController::class, 'index'])->name('index');

            // Show form to create a new admin
            Route::get('/create', [AdminController::class, 'create'])->name('create');

            // Process form submission for new admin
            Route::post('/', [AdminController::class, 'store'])->name('store');

            // Show form to edit an existing admin
            Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('edit');

            // Process form submission for updating an admin
            Route::put('/{admin}', [AdminController::class, 'update'])->name('update');

            // Delete an admin (soft delete)
            Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
        });
    });
});
