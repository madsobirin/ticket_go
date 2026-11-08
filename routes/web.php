<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('register');

Route::get('/register', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::prefix('member')->name('member.')->group(function () {
    Route::get('/beranda', function () {
        return view('member.beranda');
    })->name('beranda');

    Route::get('/jadwal', function () {
        return view('member.jadwal');
    })->name('cari-jadwal');

    Route::get('/kursi', function () {
        return view('member.kursi');
    })->name('pilih-kursi');

    Route::get('/pesanan', function () {
        return view('member.pesanan');
    })->name('pesanan');

    Route::get('/pembayaran', function () {
        return view('member.pembayaran');
    })->name('pembayaran');

    Route::get('/konfirmasi-pembayaran', function () {
        return view('member.konfirmasi-pembayaran');
    })->name('konfirmasi-pembayaran');

    Route::get('/keluhan', function () {
        return view('member.keluhan');
    })->name('keluhan');

    Route::get('/profil', function () {
        return view('member.profil');
    })->name('profil');
});

Route::prefix('operator')->name('operator.')->group(function () {
    Route::get('/', function () {
        return view('operator.dashboard');
    })->name('dashboard');

    Route::get('/pesanan', function () {
        return view('operator.pesanan');
    })->name('pesanan');

    Route::get('/konfirmasi-pembayaran', function () {
        return view('operator.konfirmasi-pembayaran');
    })->name('konfirmasi-pembayaran');

    Route::get('/layani-pemesanan', function () {
        return view('operator.layani-pemesanan');
    })->name('layani-pemesanan');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/pelanggan', function () {
        return view('admin.pelanggan');
    })->name('pelanggan');

    Route::get('/jadwal', function () {
        return view('admin.jadwal');
    })->name('jadwal');

    Route::get('/kota', function () {
        return view('admin.kota');
    })->name('kota');

    Route::get('/kendaraan', function () {
        return view('admin.kendaraan');
    })->name('kendaraan');

    Route::get('/keluhan', function () {
        return view('admin.keluhan');
    })->name('keluhan');
});
