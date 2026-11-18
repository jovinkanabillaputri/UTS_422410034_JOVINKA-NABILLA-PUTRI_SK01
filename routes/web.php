<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelompokTanamanController;
use App\Http\Controllers\PerlakuanPenyimpananController;
use App\Http\Controllers\AksesiBenihController;

// Halaman Login
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Halaman setelah Login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('Kelompok Tanaman', KelompokTanamanController::class)
    ->parameters(['Kelompok Tanaman' => 'kelompokTanaman']);

    Route::resource('Perlakuan Penyimpanan', PerlakuanPenyimpananController::class)
    ->parameters(['Perlakuan Penyimpanan' => 'perlakuanPenyimpanan']);

    Route::resource('Aksesi Benih', AksesiBenihController::class)
    ->parameters(['Aksesi Benih' => 'aksesiBenih']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});