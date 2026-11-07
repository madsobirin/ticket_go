<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Operator\DashboardController as OperatorDashboardController;
use Illuminate\Support\Facades\Route;

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/', [RegisterController::class, 'show'])->name('home');
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

    // Member Area
    Route::prefix('member')->as('member.')->middleware('role:member')->group(function () {
        Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('dashboard');
    });

    // Operator Area (Operator & Admin)
    Route::prefix('operator')->as('operator.')->middleware('role:operator,admin')->group(function () {
        Route::get('/dashboard', [OperatorDashboardController::class, 'index'])->name('dashboard');
    });

    // Admin Area (Admin only)
    Route::prefix('admin')->as('admin.')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    });
});
