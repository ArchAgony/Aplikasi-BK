<?php

use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\KunjunganRumahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// INI WORKFLOWNYA BACKEND

Route::post('/register', [UserController::class, 'Register']);
Route::post('/login', [UserController::class, 'Login']);
Route::post('/logout', [UserController::class, 'Logout'])->middleware('auth:sanctum');

Route::get('/siswa', [SiswaController::class,'index']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::put('/siswa/{siswa}', [SiswaController::class, 'update']);
Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy']);

Route::get('/bukuTamu', [BukuTamuController::class,'index']);
Route::post('/bukuTamu', [BukuTamuController::class, 'store']);
Route::put('/bukuTamu/{bukuTamu}', [BukuTamuController::class, 'update']);
Route::delete('/bukuTamu/{bukuTamu}', [BukuTamuController::class, 'destroy']);

Route::get('/kunjunganRumah', [KunjunganRumahController::class,'index']);
Route::post('/kunjunganRumah', [KunjunganRumahController::class, 'store']);
Route::put('/kunjunganRumah/{kunjunganRumah}', [KunjunganRumahController::class, 'update']);
Route::delete('/kunjunganRumah/{kunjunganRumah}', [KunjunganRumahController::class, 'destroy']);
