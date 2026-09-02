<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // GET /api/jurusan - buat siswa liat sisa kuota
    public function index()
    {
        return response()->json(Jurusan::all());
    }

    // GET /api/jurusan/{id_jurusan}
    public function show($id_jurusan)
    {
        return response()->json(Jurusan::findOrFail($id_jurusan));
    }

    // GET /kuota - halaman admin Kelola Kuota Jurusan
    public function kuotaAdmin()
    {
        $jurusan = Jurusan::all()->map(function ($j) {
            $terisi = Pendaftar::where('jurusan_pilihan_1', $j->kode_jurusan)->count();

            return [
                'kode' => $j->kode_jurusan,
                'nama' => $j->nama_jurusan,
                'kapasitas' => $j->kuota,
                'terisi' => $terisi,
                'status' => $terisi >= $j->kuota ? 'Tutup' : 'Buka',
            ];
        });

        return view('kuota', compact('jurusan'));
    }

    // PUT /api/admin/jurusan/{id_jurusan} - update kuota
    public function update(Request $request, $id_jurusan)
    {
        $jurusan = Jurusan::findOrFail($id_jurusan);

        $validated = $request->validate([
            'kuota' => 'required|integer|min:1',
            'biaya' => 'nullable|integer',
            'nama_jurusan' => 'sometimes|string|max:100',
            'deskripsi' => 'nullable|string'
        ]);

        // Hitung terisi dari data pendaftar asli, bukan kolom "terisi" (kolom itu gak ada di tabel jurusan)
        $terisi = Pendaftar::where('jurusan_pilihan_1', $jurusan->kode_jurusan)->count();

        // CEK: biar kuota baru ga lebih kecil dari yg udah daftar
        if ($validated['kuota'] < $terisi) {
            return response()->json([
                'message' => "Gagal. Kuota baru {$validated['kuota']} lebih kecil dari pendaftar saat ini: {$terisi}"
            ], 422);
        }

        $jurusan->update($validated);
        return response()->json(['message' => 'Data jurusan berhasil diupdate', 'data' => $jurusan]);
    }

    // DELETE /api/admin/jurusan/{id_jurusan}
    public function destroy($id_jurusan)
    {
        $jurusan = Jurusan::findOrFail($id_jurusan);

        $terisi = Pendaftar::where('jurusan_pilihan_1', $jurusan->kode_jurusan)->count();
        if ($terisi > 0) {
            return response()->json(['message' => 'Gagal hapus. Masih ada pendaftar di jurusan ini'], 422);
        }
        $jurusan->delete();
        return response()->json(['message' => 'Jurusan berhasil dihapus']);
    }
}