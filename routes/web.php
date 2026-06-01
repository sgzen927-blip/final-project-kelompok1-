<?php

use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; // Pastikan sudah di-import
use Illuminate\Support\Facades\Route;

// Halaman utama diarahkan ke login
Route::get('/', function () {
    return redirect('/login');
});

// Grup rute yang mengharuskan user sudah LOGIN (Auth)
Route::middleware(['auth'])->group(function () {
    
    // Rute Profil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Dashboard (Sudah diperbaiki ke DashboardController)
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['verified'])
        ->name('dashboard');

    // Rute Warga (Bisa diakses semua yang login)
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');

    // Rute Khusus ADMIN (Create, Edit, Delete)
    Route::middleware(['can:is-admin'])->group(function () {
        Route::get('/warga/create', [WargaController::class, 'create'])->name('warga.create');
        Route::post('/warga', [WargaController::class, 'store'])->name('warga.store');
        
        Route::get('/warga/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
        Route::put('/warga/{id}', [WargaController::class, 'update'])->name('warga.update');
        Route::delete('/warga/{id}', [WargaController::class, 'destroy'])->name('warga.destroy');
    });
});

// Memuat rute Login/Register bawaan Breeze
require __DIR__.'/auth.php';    