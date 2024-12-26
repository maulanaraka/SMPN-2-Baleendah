<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\TempatTinggalController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\MataPelajaranSiswaController;
use App\Http\Controllers\SiswaEkstrakurikulerController;
use App\Http\Controllers\BeasiswaController;

use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataPelajaranController;

use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/', function () {return view('landing');});
    Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
});

// Register routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

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

    // Data Sekolah
    //================================================================================================================================================================
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

    //Backup
    Route::get('/backup-data', [SiswaController::class, 'showBackup'])->name('siswa.showBackup');
    Route::get('/download-backup', [SiswaController::class, 'downloadBackup'])->name('siswa.downloadBackup');


    // Data Siswa
    //================================================================================================================================================================
    // Siswa
    Route::get('/siswa/input', [SiswaController::class, 'create'])->name('siswa.input');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{siswaID}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswaID}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswaID}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::get('/data-siswa', [SiswaController::class, 'dataSiswa'])->name('data-siswa');
    Route::get('/siswa/{siswaID}/show', [SiswaController::class, 'show'])->name('siswa.show');

    // Kesehatan
    Route::get('/kesehatan/input', [KesehatanController::class, 'create'])->name('kesehatan.input');
    Route::post('/kesehatan', [KesehatanController::class, 'store'])->name('kesehatan.store');
    Route::get('/kesehatan/{kesehatanID}/edit', [KesehatanController::class, 'edit'])->name('kesehatan.edit');
    Route::put('/kesehatan/{kesehatanID}', [KesehatanController::class, 'update'])->name('kesehatan.update');

    // Tempat Tinggal
    Route::get('/tempat-tinggal/input', [TempatTinggalController::class, 'create'])->name('tempat_tinggal.input');
    Route::post('/tempat-tinggal', [TempatTinggalController::class, 'store'])->name('tempat_tinggal.store');
    Route::get('tempat-tinggal/{tempatTinggalID}/edit', [TempatTinggalController::class, 'edit'])->name('tempat_tinggal.edit');
    Route::put('tempat-tinggal/{tempatTinggalID}', [TempatTinggalController::class, 'update'])->name('tempat_tinggal.update');

    // Orang Tua
    Route::get('orang-tua/input', [OrangTuaController::class, 'create'])->name('orang_tua.input');
    Route::post('orang-tua', [OrangTuaController::class, 'store'])->name('orang_tua.store');
    Route::get('orang-tua/{orangTuaID}/edit', [OrangTuaController::class, 'edit'])->name('orang_tua.edit');
    Route::put('orang-tua/{orangTuaID}', [OrangTuaController::class, 'update'])->name('orang_tua.update');
    
    // Wali
    Route::get('wali/input', [WaliController::class, 'create'])->name('wali.input');
    Route::post('wali', [WaliController::class, 'store'])->name('wali.store');
    Route::get('wali/{waliId}/edit', [WaliController::class, 'edit'])->name('wali.edit');
    Route::put('wali/{waliaId}', [WaliController::class, 'update'])->name('wali.update');

    // Kelas
    Route::prefix('siswa/{siswaID}')->name('siswa.')->group(function() {
        Route::get('kelas', [SiswaKelasController::class, 'editKelasIndex'])->name('kelas.index');
        Route::get('kelas/{siswaKelasID}/edit', [SiswaKelasController::class, 'editKelas'])->name('kelas.edit');
        Route::get('kelas/create', [SiswaKelasController::class, 'createKelas'])->name('kelas.create');
        Route::post('kelas', [SiswaKelasController::class, 'storeKelas'])->name('kelas.store');
        Route::put('kelas/{siswaKelasID}', [SiswaKelasController::class, 'updateKelas'])->name('kelas.update');
        Route::delete('kelas/{siswaKelasID}', [SiswaKelasController::class, 'destroyKelas'])->name('kelas.destroy');
    });

    // Kehadiran
    Route::prefix('siswa/{siswaID}')->name('siswa.')->group(function () {
        Route::prefix('kehadiran')->group(function () {
            Route::get('/', [KehadiranController::class, 'index'])->name('kehadiran.index');
            Route::get('create', [KehadiranController::class, 'create'])->name('kehadiran.create');
            Route::post('/', [KehadiranController::class, 'store'])->name('kehadiran.store');
            Route::get('{kehadiranID}/edit', [KehadiranController::class, 'edit'])->name('kehadiran.edit');
            Route::put('{kehadiranID}', [KehadiranController::class, 'update'])->name('kehadiran.update');
            Route::get('{kehadiranID}', [KehadiranController::class, 'show'])->name('kehadiran.show');
            Route::delete('{kehadiranID}', [KehadiranController::class, 'destroy'])->name('kehadiran.destroy');
        });
    });

    // Nilai
    Route::prefix('siswa/{siswaID}')->name('siswa.')->group(function() {
        Route::get('nilai', [MataPelajaranSiswaController::class, 'index'])->name('nilai.index');
        Route::get('nilai/create', [MataPelajaranSiswaController::class, 'create'])->name('nilai.create');
        Route::post('nilai', [MataPelajaranSiswaController::class, 'store'])->name('nilai.store');
        Route::get('nilai/{mataPelajaranSiswaID}/edit', [MataPelajaranSiswaController::class, 'edit'])->name('nilai.edit');
        Route::put('nilai/{mataPelajaranSiswaID}', [MataPelajaranSiswaController::class, 'update'])->name('nilai.update');
        Route::delete('nilai/{mataPelajaranSiswaID}', [MataPelajaranSiswaController::class, 'destroy'])->name('nilai.destroy');
    });

    // Ekstrakurikuler
    Route::prefix('siswa/{siswaID}')->name('siswa.')->group(function () {
        Route::get('ekstrakurikuler', [SiswaEkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
        Route::get('ekstrakurikuler/create', [SiswaEkstrakurikulerController::class, 'create'])->name('ekstrakurikuler.create');
        Route::post('ekstrakurikuler', [SiswaEkstrakurikulerController::class, 'store'])->name('ekstrakurikuler.store');
        Route::get('ekstrakurikuler/{siswaEkstrakurikulerID}/edit', [SiswaEkstrakurikulerController::class, 'edit'])->name('ekstrakurikuler.edit');
        Route::put('ekstrakurikuler/{siswaEkstrakurikulerID}', [SiswaEkstrakurikulerController::class, 'update'])->name('ekstrakurikuler.update');
        Route::delete('ekstrakurikuler/{siswaEkstrakurikulerID}', [SiswaEkstrakurikulerController::class, 'destroy'])->name('ekstrakurikuler.destroy');
    });    

    // Beasiswa
    Route::prefix('siswa/{SiswasiswaID}/beasiswa')->name('siswa.')->group(function () {
        Route::get('/', [BeasiswaController::class, 'index'])->name('beasiswa.index');
        Route::get('/create', [BeasiswaController::class, 'create'])->name('beasiswa.create');
        Route::post('/', [BeasiswaController::class, 'store'])->name('beasiswa.store');
        Route::get('/{beasiswaID}/edit', [BeasiswaController::class, 'edit'])->name('beasiswa.edit');
        Route::put('/{beasiswaID}', [BeasiswaController::class, 'update'])->name('beasiswa.update');
        Route::delete('/{beasiswaID}', [BeasiswaController::class, 'destroy'])->name('beasiswa.destroy');
    });



});


