<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\KunjunganRumahController;
use App\Http\Controllers\LaporanKonselingController;

Route::middleware('auth')->group(function () {

    Route::get("/", [DashboardController::class, "index"]);

    Route::get("/siswa", [SiswaController::class, "index"]);
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::post('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::get('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    Route::get("/tamu", [BukuTamuController::class, "index"]);
    Route::get("/tamu/create", [BukuTamuController::class, "create"]);
    Route::post("/tamu/store", [BukuTamuController::class, "store"]);
    Route::get("/tamu/{id}/edit", [BukuTamuController::class, "edit"]);
    Route::post("/tamu/{id}", [BukuTamuController::class, "update"]);
    Route::get("/tamu/{id}", [BukuTamuController::class, "destroy"]);
    Route::get("/tamu/export/excel", [BukuTamuController::class, "exportExcel"]);

    Route::get("/laporan", [LaporanKonselingController::class, "index"]);
    Route::get("/laporan/create", [LaporanKonselingController::class, "create"]);
    Route::post("/laporan", [LaporanKonselingController::class, "store"]);
    Route::get("/laporan/{id}/edit", [LaporanKonselingController::class, "edit"]);
    Route::post("/laporan/{id}", [LaporanKonselingController::class, "update"]);
    Route::get("/laporan/{id}", [LaporanKonselingController::class, "destroy"]);
    Route::get("/laporan/export/excel", [LaporanKonselingController::class, "exportExcel"]);

    Route::get("/kunjungan", [KunjunganRumahController::class, "index"]);
    Route::get('/kunjungan/create', [KunjunganRumahController::class, 'create'])->name('kunjungan.create');
    Route::post("/kunjungan", [KunjunganRumahController::class, "index"])->name('kunjungan.store');

    Route::get('/kunjungan/{id}/delete', [KunjunganRumahController::class, 'destroy'])->name('kunjungan.delete');
    Route::get('/kunjungan/{id}/edit', [KunjunganRumahController::class, 'edit'])->name('kunjungan.edit');
    Route::post("/kunjungan/{id}", [KunjunganRumahController::class, "update"])->name('kunjungan.update');

    route::post('/kunjungan', [KunjunganRumahController::class, 'store'])->name('kunjungan.store');
});

Route::get('/register', [UserController::class, 'RegisterForm'])->name('register.form');
Route::post('/register', [UserController::class, 'Register'])->name('register');

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'LoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'Login']);
});

Route::post('/logout', [UserController::class, 'Logout']);
