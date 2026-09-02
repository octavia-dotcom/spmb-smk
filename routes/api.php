<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GrafikPendaftarController;


Route::group(['middleware' => ['api']], function () { // <- ini penting
    
    Route::post('/register', [AuthController::class, 'registerSiswa']);
    Route::post('/login', [AuthController::class, 'login']); // <- login harus di dalam sini
    Route::post('/login', [AuthController::class, 'loginApi']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/pendaftar', [PendaftarController::class, 'store']);
         });
});

// BUTUH LOGIN SEMUA ROLE
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/jurusan/{id_jurusan}', [JurusanController::class, 'show']);
    Route::post('/lupa-password', [AuthController::class, 'lupaPassword']);

    // KHUSUS SISWA
    Route::middleware('role:siswa')->group(function () {
        Route::post('/pendaftar', [PendaftarController::class, 'store']); 
        Route::get('/pendaftar', [PendaftarController::class, 'index']); 
        Route::post('/pendaftar/{id}/dokumen', [DokumenController::class, 'update']);
        Route::get('/pendaftar/{id}/dokumen', [DokumenController::class, 'show']);
    });
    Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'userProfile']);
});

    // KHUSUS ADMIN
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/grafik', [GrafikPendaftarController::class, 'index']);
        Route::get('/admin/pendaftar', [PendaftarController::class, 'listForAdmin']);
        Route::get('/admin/pendaftar/{id}/detail', [PendaftarController::class, 'detailAdmin']);
        Route::put('/admin/pendaftar/{id}/pendaftar/verifikasi', [PendaftarController::class, 'verifikasiUpdate']);

        // CRUD KUOTA KHUSUS ADMIN
        Route::post('/admin/jurusan', [JurusanController::class, 'store']); 
        Route::put('/admin/jurusan/{id_jurusan}', [JurusanController::class, 'update']); 
        Route::delete('/admin/jurusan/{id_jurusan}', [JurusanController::class, 'destroy']); 
        Route::get('/jurusan', [JurusanController::class, 'index']);
    });
    Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pengumuman', [PendaftarController::class, 'pengumuman']);
});
});