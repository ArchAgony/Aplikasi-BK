<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\KunjunganRumahController;
use App\Http\Controllers\LaporanKController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard/master');
// });
Route::get("/dashboard", [DashboardController::class,"index"]);
Route::get("/siswa", [SiswaController::class,"index"]);
Route::get("/tamu", [BukuTamuController::class,"index"]);
Route::get("/tamu/create", [BukuTamuController::class,"create"]);
Route::get("/laporan", [LaporanKController::class, "index"]);
Route::get("/laporan/create", [LaporanKController::class, "create"]);
Route::get("/kunjungan", [KunjunganRumahController::class,"index"]);

Route::get('/register', [UserController::class, 'RegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'Register'])->name('register');
Route::get('/', function () {
    return view('/auth/login');
});
