<?php

namespace App\Http\Controllers;

use App\Models\GrafikPendaftar;
use App\Models\Jurusan;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

    class GrafikPendaftarController extends Controller
{
    public function index()
    {
        // 1. Update dulu tabel grafik_pendaftar biar datanya selalu baru
        $jurusans = Jurusan::all();
        foreach($jurusans as $jrs){
            $total = Pendaftar::where('jurusan_pilihan_1', $jrs->id_jurusan)
                    ->orWhere('jurusan_pilihan_2', $jrs->id_jurusan)
                    ->count();

            GrafikPendaftar::updateOrCreate(
                ['id_jurusan' => $jrs->id_jurusan],
                ['jumlah_pendaftar' => $total]
            );
        }

        // 2. Ambil data buat dikirim ke FE
        $data = GrafikPendaftar::with('jurusan')->get();

       // 2. Ambil data
$data = GrafikPendaftar::with('jurusan')->get();

// Siapkan data untuk view agar mudah dipakai oleh grafik
$grafikData = $data->map(function($item) {
    return [
        'nama_jurusan' => $item->jurusan->nama_jurusan,
        'kuota' => $item->jurusan->kuota,
        'jumlah_pendaftar' => $item->jumlah_pendaftar,
        'sisa_kuota' => $item->jurusan->kuota - $item->jumlah_pendaftar,
    ];
});

// Kirim ke view 'daftar'
return view('daftar', compact('grafikData'));
    }
}