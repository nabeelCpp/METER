<?php

use App\Http\Controllers\Admin\{AdminController, AuthController as AdminAuthController, Dashboard as AdminDashboardController};
use App\Http\Controllers\Superadmin\{AuthController as SuperAdminAuthController, Dashboard as SuperadminDashboardController};
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->as('superadmin.')->group(function () {
    Route::middleware('guest.custom:superadmin')->get('/login', [SuperAdminAuthController::class, 'showLoginForm'])->name('login');
    Route::middleware('guest.custom:superadmin')->post('/login', [SuperAdminAuthController::class, 'login']);
    Route::post('/logout', [SuperAdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth.custom:superadmin')->group(function () {
        Route::get('/', [SuperadminDashboardController::class, 'index'])->name('dashboard');
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

Route::prefix('admin')->as('admin.')->group(function () {
    // Show the admin login form
    Route::middleware('guest.custom:admin')->get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    // Process the admin login form submission
    Route::middleware('guest.custom:admin')->post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::middleware('auth.custom:admin')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        // Route::prefix('admins')->name('admins.')->group(function () {

        // });
    });
});
