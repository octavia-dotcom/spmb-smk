<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller {
 public function biodata()
{
    $user = auth()->user();
    $pendaftar = \App\Models\Pendaftar::with(['jurusanPilihan1', 'jurusanPilihan2'])
                 ->where('id_user', $user->id_user)
                 ->first();
    // Gunakan $user->id_user karena primary key tabel users adalah id_user
    $pendaftar = \App\Models\Pendaftar::where('id_user', $user->id_user)->first();

    // Ambil data orang tua menggunakan primary key 'id_pendaftar'
    $dataOrangTua = \App\Models\DataOrangTua::where('id_pendaftar', $pendaftar->id_pendaftar ?? null)->first();

    return view('biodata_siswa', compact('pendaftar', 'dataOrangTua'));
}
public function berkas()
{
    $user = auth()->user();

    $pendaftar = \App\Models\Pendaftar::where('id_user', $user->id_user ?? $user->id)->first();

    return view('berkas_pendaftaran', compact('pendaftar'));
}

public function index() // <--- Ubah dari dashboardSiswa jadi index
    {
        $user = auth()->user();
        
        $pendaftar = \App\Models\Pendaftar::with(['jurusanPilihan1', 'verifikasi'])
                ->where('id_user', $user->id_user ?? $user->id) 
                ->first();

        return view('dashboard_siswa', compact('pendaftar'));
    }

// GET /pengumuman_siswa
public function pengumumanSiswa()
{
    $user = auth()->user();

    $pendaftar = \App\Models\Pendaftar::where('id_user', $user->id_user ?? $user->id)
                 ->first();

    return view('pengumuman_siswa', compact('pendaftar'));
}
}