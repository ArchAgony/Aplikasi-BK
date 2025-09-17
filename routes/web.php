<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\KunjunganRumahController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard/master');
// });

Route::get("/dashboard", [DashboardController::class,"index"]);

Route::get("/siswa", [SiswaController::class,"index"]);
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get("/tamu", [BukuTamuController::class,"index"]);
Route::get("/kunjungan", [KunjunganRumahController::class,"index"]);

Route::get('/register', [UserController::class, 'RegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'Register'])->name('register');
Route::get('/', function () {
    return view('/auth/login');
});
