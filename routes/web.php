<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\KunjunganRumahController;
use App\Http\Controllers\LaporanKonselingController;

Route::get("/dashboard", [DashboardController::class,"index"]);

Route::get("/siswa", [SiswaController::class,"index"]);
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get("/tamu", [BukuTamuController::class,"index"]);
Route::get("/tamu/create", [BukuTamuController::class,"create"]);

Route::get("/laporan", [LaporanKonselingController::class, "index"]);
Route::get("/laporan/create", [LaporanKonselingController::class, "create"]);

Route::get("/kunjungan", [KunjunganRumahController::class,"index"]);
Route::get('/kunjungan/create', [KunjunganRumahController::class, 'create']);
Route::get('/kunjungan/{id}/laporan', [KunjunganRumahController::class, 'laporan'])->name('kunjungan.laporan');
Route::get('/kunjungan/{id}/layanan', [KunjunganRumahController::class, 'layanan'])->name('kunjungan.layanan');


route::post('/kunjungan', [KunjunganRumahController::class, 'store'])->name('kunjungan.store');

Route::get('/register', [UserController::class, 'RegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'Register'])->name('register');
Route::get('/login', function () {
    return view('/auth/login');
});
