<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
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
    Route::get('/siswa/{siswaID}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswaID}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswaID}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    // For index and show, no changes needed, just update view paths if necessary
    Route::get('/data-siswa', [SiswaController::class, 'dataSiswa'])->name('data-siswa');
    Route::get('/siswa/{siswaID}/show', [SiswaController::class, 'show'])->name('siswa.show');
});


// Data Siswa Page (Require Authentication)
// Route::middleware(['auth'])->get('/data-siswa', [SiswaController::class, 'dataSiswa'])->name('data-siswa');


