<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KrsController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('dosens', DosenController::class);
    Route::resource('mahasiswas', MahasiswaController::class);
    Route::resource('mata-kuliahs', MataKuliahController::class);
    Route::resource('jadwals', JadwalController::class);
    Route::resource('krs', KrsController::class);
    Route::get('/krs/{kr}/cetak', [KrsController::class, 'cetak'])->name('krs.cetak');
});

require __DIR__.'/auth.php';
