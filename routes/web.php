<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landing');
});

// Authentication Middleware
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
});

// User Routing
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->middleware('UserAccess:admin')->name('admin');
    Route::get('/operator', [UserController::class, 'operator'])->middleware('UserAccess:operator')->name('operator');
    Route::get('/staff', [UserController::class, 'staff'])->middleware('UserAccess:staff')->name('staff');
    Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
});

// Staff - Siswa Routes
Route::middleware(['auth', 'UserAccess:staff'])->group(function () {
    Route::get('/siswa/{siswaID}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::delete('/siswa/{siswaID}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});

// Data Siswa Page (Require Authentication)
Route::middleware(['auth'])->group(function () {
    Route::get('/data-siswa', [SiswaController::class, 'dataSiswa'])->name('data-siswa'); // Fixed path
});

