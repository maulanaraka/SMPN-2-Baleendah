<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KesehatanController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Landing page (No authentication required)
Route::get('/', function () {
    return view('landing');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
});

// Logout route
Route::post('/logout', [SessionController::class, 'logout'])->name('logout')->middleware('auth');

// User Role-Based Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
});

Route::middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/operator', [UserController::class, 'operator'])->name('operator');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff', [UserController::class, 'staff'])->name('staff');

    // Siswa
    Route::get('/siswa/{siswaID}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswaID}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswaID}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/data-siswa', [SiswaController::class, 'dataSiswa'])->name('data-siswa');
    Route::get('/siswa/{siswaID}/show', [SiswaController::class, 'show'])->name('siswa.show');

    // Kesehatan
    Route::get('/kesehatan/input', [KesehatanController::class, 'create'])->name('kesehatan.create');
    Route::post('/kesehatan', [KesehatanController::class, 'store'])->name('kesehatan.store');
    Route::get('/kesehatan/{kesehatanID}/edit', [KesehatanController::class, 'edit'])->name('kesehatan.edit');
    Route::put('/kesehatan/{kesehatanID}', [KesehatanController::class, 'update'])->name('kesehatan.update');
});



