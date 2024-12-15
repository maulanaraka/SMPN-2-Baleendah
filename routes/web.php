<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\TempatTinggalController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\WaliController;


use App\Http\Middleware\UserAccess;
use App\Models\Wali;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('landing');});
    Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
});

// Logout route
Route::post('/logout', [SessionController::class, 'logout'])->name('logout')->middleware('auth');

// User Role-Based Routes

//Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
});

// Operator
Route::middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/operator', [UserController::class, 'operator'])->name('operator');
});

// Staff
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

    // Tempat Tinggal
    Route::get('tempat-tinggal/{tempatTinggalID}/edit', [TempatTinggalController::class, 'edit'])->name('tempat_tinggal.edit');
    Route::put('tempat-tinggal{tempatTinggalID}', [TempatTinggalController::class, 'update'])->name('tempat_tinggal.update');

    // Orang Tua
    Route::get('orang-tua/{orangTuaID}/edit', [OrangTuaController::class, 'edit'])->name('orang_tua.edit');
    Route::put('orang-tua/{orangTuaID}', [OrangTuaController::class, 'update'])->name('orang_tua.update');
    
    // Orang Tua
    Route::get('wali/{siswaId}/edit', [WaliController::class, 'edit'])->name('wali.edit');
    Route::put('wali/{siswaId}', [WaliController::class, 'update'])->name('wali.update');
});



