<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\UserAccess;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

// Authentication Middleware
Route::middleware(['guest'])->group(function(){
    Route::get('/login', [SessionController::class,'index'])->name('login');
    Route::post('/login', [SessionController::class,'login']);
});

// Route::get('/home',function(){
//     return redirect('/operator');
// });

// Operator Routing
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [UserController::class, 'admin'])->middleware('UserAccess:admin');
    Route::get('/operator', [UserController::class, 'operator'])->middleware('UserAccess:operator');
    Route::get('/staff', [UserController::class, 'staff'])->middleware('UserAccess:staff');
    Route::get('/logout', [SessionController::class, 'logout']);
});




