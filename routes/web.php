<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\TempatTinggalController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\WaliController;

use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Middleware\UserAccess;
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

    // Ekstrakurikuler
    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
    Route::get('/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])->name('ekstrakurikuler.create');
    Route::post('/ekstrakurikuler', [EkstrakurikulerController::class, 'store'])->name('ekstrakurikuler.store');
    Route::get('/ekstrakurikuler/{ekstrakurikulerID}/edit', [EkstrakurikulerController::class, 'edit'])->name('ekstrakurikuler.edit');
    Route::put('/ekstrakurikuler/{ekstrakurikulerID}', [EkstrakurikulerController::class, 'update'])->name('ekstrakurikuler.update');
    Route::delete('/ekstrakurikuler/{ekstrakurikulerID}', [EkstrakurikulerController::class, 'destroy'])->name('ekstrakurikuler.destroy');

    // Kelas
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('/kelas/{kelasID}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('/kelas/{kelasID}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{kelasID}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    // Mata Pelajaran
    Route::get('/mata-pelajaran', [MataPelajaranController::class, 'index'])->name('mata_pelajaran.index');
    Route::get('/mata-pelajaran/create', [MataPelajaranController::class, 'create'])->name('mata_pelajaran.create');
    Route::post('/mata-pelajaran', [MataPelajaranController::class, 'store'])->name('mata_pelajaran.store');
    Route::get('/mata-pelajaran/{mataPelajaranID}/edit', [MataPelajaranController::class, 'edit'])->name('mata_pelajaran.edit');
    Route::put('/mata-pelajaran/{mataPelajaranID}', [MataPelajaranController::class, 'update'])->name('mata_pelajaran.update');
    Route::delete('/mata-pelajaran/{mataPelajaranID}', [MataPelajaranController::class, 'destroy'])->name('mata_pelajaran.destroy');

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
    
    // Wali
    Route::get('wali/{waliId}/edit', [WaliController::class, 'edit'])->name('wali.edit');
    Route::put('wali/{waliaId}', [WaliController::class, 'update'])->name('wali.update');

    // Kelas
    Route::get('kelas/{siswaKelasID}/edit', [SiswaKelasController::class, 'edit'])->name('siswa_kelas.edit');
    Route::put('kelas/{siswaKelasID}', [SiswaKelasController::class, 'update'])->name('siswa_kelas.update');
});



