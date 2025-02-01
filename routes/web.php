<?php
use App\Http\Controllers\Superadmin\AuthController as SuperAdminAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('superadmin')->group(function () {
    Route::get('/login', [SuperAdminAuthController::class, 'showLoginForm'])->name('superadmin.login');
    Route::post('/login', [SuperAdminAuthController::class, 'login']);
    Route::post('/logout', [SuperAdminAuthController::class, 'logout'])->name('superadmin.logout');

    Route::middleware('auth:superadmin')->group(function () {
        Route::get('/dashboard', function () {
            return view('superadmin.dashboard');
        })->name('superadmin.dashboard');
    });
});
