<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Member\BookingController as MemberBookingController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Operator\CityController;
use App\Http\Controllers\Operator\DashboardController as OperatorDashboardController;
use App\Http\Controllers\Operator\RouteController;
use App\Http\Controllers\Operator\ScheduleController;
use App\Http\Controllers\Operator\VehicleController;
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

    // Member Area (Protected)
    Route::prefix('member')->as('member.')->middleware('role:member')->group(function () {
        Route::get('/dashboard', [MemberDashboardController::class, 'index'])->name('dashboard');
        Route::get('/beranda', [MemberDashboardController::class, 'index'])->name('beranda');
        Route::get('/jadwal', [MemberBookingController::class, 'search'])->name('cari-jadwal');
        Route::get('/kursi/{schedule}', [MemberBookingController::class, 'seatPicker'])->name('pilih-kursi');
        Route::post('/booking', [MemberBookingController::class, 'store'])->name('booking.store');

        Route::get('/pesanan', fn () => view('member.pesanan'))->name('pesanan');
        Route::get('/pembayaran', fn () => view('member.pembayaran'))->name('pembayaran');
        Route::get('/konfirmasi-pembayaran', fn () => view('member.konfirmasi-pembayaran'))->name('konfirmasi-pembayaran');
        Route::get('/keluhan', fn () => view('member.keluhan'))->name('keluhan');
        Route::get('/profil', fn () => view('member.profil'))->name('profil');
    });

    // Operator Area (Operator & Admin)
    Route::prefix('operator')->as('operator.')->middleware('role:operator,admin')->group(function () {
        Route::get('/dashboard', [OperatorDashboardController::class, 'index'])->name('dashboard');

        // Master Data CRUD
        Route::resource('cities', CityController::class)->except(['show']);
        Route::resource('routes', RouteController::class)->except(['show']);
        Route::resource('vehicles', VehicleController::class)->except(['show']);
        Route::resource('schedules', ScheduleController::class)->except(['show']);

        // Operator UI Pages
        Route::get('/pesanan', fn () => view('operator.pesanan'))->name('pesanan');
        Route::get('/konfirmasi-pembayaran', fn () => view('operator.konfirmasi-pembayaran'))->name('konfirmasi-pembayaran');
        Route::get('/layani-pemesanan', fn () => view('operator.layani-pemesanan'))->name('layani-pemesanan');
    });

    // Admin Area (Admin only)
    Route::prefix('admin')->as('admin.')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Admin UI Pages
        Route::get('/pelanggan', fn () => view('admin.pelanggan'))->name('pelanggan');
        Route::get('/jadwal', fn () => view('admin.jadwal'))->name('jadwal');
        Route::get('/kota', fn () => view('admin.kota'))->name('kota');
        Route::get('/kendaraan', fn () => view('admin.kendaraan'))->name('kendaraan');
        Route::get('/keluhan', fn () => view('admin.keluhan'))->name('keluhan');
    });
});
