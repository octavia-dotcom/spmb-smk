<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrafikPendaftarController;
use App\Http\Controllers\AdminController; // Pastikan sudah buat controller ini
use App\Http\Controllers\SiswaController; // Pastikan sudah buat controller ini


// ========== HALAMAN UTAMA ==========
Route::get('/home', function () {
    return view('home'); // nampilin home.blade.php
});
// ========== HALAMAN FRONTEND ==========
Route::get('/daftar', function () {
    return view('daftar'); // nampilin daftar.blade.php
});
Route::get('/formulir', function () {
    return view('formulir'); // nampilin formulir.blade.php
});
Route::get('/jurusan', function () {
    return view('jurusan'); // nampilin jurusan.blade.php
});
Route::get('/login', function () {
    return view('login'); 
})->name('login'); // <--- Tambahkan ini
Route::get('/unggah-berkas', function () {
    return view('unggah_berkas'); 
})->name('unggah_berkas');

Route::get('/detail-jurusan-pplg', function () {
    return view('detail_jurusan_pplg'); // nampilin detail_jurusan_pplg.blade.php
});
Route::get('detail_jurusan_bcf', function(){
    return view('detail_jurusan_bcf');
});
Route::get('detail_jurusan_mplb', function () {
    return view('detail_jurusan_mplb');
});
// routes/web.php

// Menampilkan form login
Route::get('/login', function () {
    return view('login'); // Pastikan file login.blade.php ada
});
// Menampilkan form buat akun
Route::get('/buat-akun', function () {
    return view('buat-akun'); // Pastikan file buat-akun.blade.php ada
});
Route::get('/kontak', function () {
    return view('/kontak');
});
Route::get('/dasboard_admin', function (){
    return view('dasboard_admin');
});
Route::get('/dashboard_siswa', function () {
    return view('dashboard_siswa');
});
Route::get('/list_pendaftar', function (){
    return view('list_pendaftar');
});
Route::get('/informasi', function (){
    return view('informasi');
});
Route::get('/kartu_ucapan', function (){
    return view('kartu_ucapan');
});
Route::get('/biodata_siswa', function (){
    return view('biodata_siswa');
});
Route::get('/cetak_kartu', function (){
    return view('cetak_kartu');
});
Route::get('/edit_data_siswa', function (){
    return view('edit_data_siswa');
});
Route::get('/berkas_pendaftaran', function (){
    return view('berkas_pendaftaran');
});
Route::get('/list_pendaftar', function (){
    return view('list_pendaftar');
});
Route::get('/kuota', [\App\Http\Controllers\JurusanController::class, 'kuotaAdmin']);
Route::get('/cms_landing', function (){
    return view('cms_landing');
});
Route::get('/pengumuman_admin', function (){
    return view('pengumuman_admin');
});
Route::get('/detail_pendaftar/{id}', [AdminController::class, 'detailPendaftar']);
Route::get('/edit_pendaftar/{id}', [AdminController::class, 'editPendaftar']);
Route::put('/edit_pendaftar/{id}', [AdminController::class, 'updatePendaftar']);
Route::get('/tambah_pendaftar', [AdminController::class, 'tambahPendaftar']);
Route::post('/tambah_pendaftar', [AdminController::class, 'storePendaftar']);
Route::get('/profil_admin', [AdminController::class, 'profilAdmin'])->name('profil_admin');
Route::post('/profil_admin/update', [AdminController::class, 'updateProfilAdmin'])->name('profil_admin.update');
Route::post('/profil_admin/password', [AdminController::class, 'updatePasswordAdmin'])->name('profil_admin.password');
Route::get('/seleksi_kelulusan', [AdminController::class, 'seleksiKelulusan']);
Route::post('/seleksi_kelulusan/{id}/update', [AdminController::class, 'updateSeleksi']);

// ========== ROUTE BACKEND PENDAFTAR ==========
Route::get('/pendaftar', [PendaftarController::class, 'index'])->name('pendaftar.index');
Route::get('/daftar', [PendaftarController::class, 'create']);
Route::post('/daftar', [PendaftarController::class, 'store']);
// ========== ROUTE DOKUMEN ==========
Route::post('/pendaftar/{id}/dokumen', [DokumenController::class, 'store']);
Route::get('/pendaftar/{id_pendaftar}/dokumen', [DokumenController::class, 'show']);

//=========== ROUTE GRAFIK ===========
Route::get('/daftar', [GrafikPendaftarController::class, 'index']);

// Menampilkan halaman buat akun
Route::get('/buat-akun', [AuthController::class, 'showRegisterForm']);

Route::post('/daftar-proses', [AuthController::class, 'registerSiswa'])->name('register.proses');

// Jika menggunakan method GET untuk menampilkan form unggah berkas
Route::get('/unggah_berkas', [DokumenController::class, 'create']);
Route::post('/unggah-berkas/simpan', [DokumenController::class, 'store'])->name('berkas.store');

// Atau jika menggunakan method POST untuk memproses data berkas
Route::post('/unggah_berkas', [DokumenController::class, 'store']);

// Route yang bebas diakses (Login)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//Route Kartu
Route::get('/kartu_ucapan', [PendaftarController::class, 'tampilkanKartuUcapan'])->name('kartu_ucapan');
Route::get('/biodata_siswa', [SiswaController::class, 'biodata'])->name('biodata');
Route::get('/cetak_kartu', [PendaftarController::class, 'cetakKartu'])->name('cetak_kartu');
Route::get('/berkas_pendaftaran', [PendaftarController::class, 'berkasPendaftaran'])->name('berkas_pendaftaran');
Route::get('/pengumuman_siswa', [SiswaController::class, 'pengumumanSiswa'])->name('pengumuman_siswa');

Route::middleware(['auth'])->group(function () {
    Route::get('/edit_data_siswa', [PendaftarController::class, 'edit'])->name('pendaftar.edit');
    Route::put('/edit_data_siswa/update', [PendaftarController::class, 'update'])->name('pendaftar.update');
});
// Route khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard_admin', [AdminController::class, 'index']);
});
Route::get('/list_pendaftar', [AdminController::class, 'listPendaftar']);
Route::get('/tambah_pendaftar', [AdminController::class, 'tambahPendaftar']);
Route::get('/verifikasi_berkas', [AdminController::class, 'verifikasiBerkas']);
Route::get('/verifikasi_berkas/{id}/detail', [PendaftarController::class, 'detailAdmin']);
Route::post('/verifikasi_berkas/{id}/update', [PendaftarController::class, 'verifikasiUpdate']);
// Route khusus Siswa
Route::middleware(['auth', 'role:siswa'])->group(function () {
    Route::get('/dashboard_siswa', [SiswaController::class, 'index']);
});