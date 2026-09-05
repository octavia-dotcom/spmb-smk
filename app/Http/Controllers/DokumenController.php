<?php

namespace App\Http\Controllers;

use App\Models\DokumenPendaftar;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function store(Request $request)
    {
        // 1. Ambil data pendaftar berdasarkan user yang sedang login
        $pendaftar = Pendaftar::where('id_user', auth()->id())->first();

        if (!$pendaftar) {
            return redirect()->back()->with('error', 'Data pendaftaran belum diisi. Silakan isi formulir terlebih dahulu.');
        }

        $id_pendaftar = $pendaftar->id_pendaftar;

        // Samakan dulu format "Ya"/"Tidak"-nya di sini, sebelum divalidasi/dipakai
        // di bawah. Form pendaftaran (formulir_blade.php) kirim huruf kecil "ya"/"tidak",
        // sementara aturan required_if & pengecekan di bawah ini pakai "Ya" (huruf besar).
        // Tanpa ini, perbandingannya selalu gagal (case-sensitive) dan is_penerima_bantuan
        // ke-reset jadi "Tidak" terus meskipun pendaftar sebenarnya memilih "Ya".
        $request->merge([
            'is_penerima_bantuan' => strtolower(trim((string) $request->input('is_penerima_bantuan'))) === 'ya' ? 'Ya' : 'Tidak',
        ]);

        // 2. Validasi Input Form
        $request->validate([
            'pas_foto'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048', 
            'skl'              => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
            'kk'               => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'akta'             => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp_ayah'         => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'ktp_ibu'         => 'required|mimes:pdf,jpg,jpeg,png|max:1024',
            'bukti_pembayaran' => 'required_if:metode_pembayaran,transfer|mimes:pdf,jpg,jpeg,png|max:2048',
            'berkas_bantuan'   => 'required_if:is_penerima_bantuan,Ya|mimes:pdf,jpg,jpeg,png|max:2048',
        ], [
            'bukti_pembayaran.required_if' => 'Karena Anda memilih metode Transfer, bukti pembayaran wajib diunggah!',
            'berkas_bantuan.required_if'   => 'Karena Anda memilih sebagai penerima bantuan, dokumen kartu bantuan wajib diunggah!',
        ], [
            'kk.required'               => 'Kartu Keluarga (KK) wajib diunggah!',
            'akta.required'             => 'Akta Kelahiran wajib diunggah!',
            'ktp_ayah.required'         => 'KTP Ayah wajib diunggah!',
            'ktp_ibu.required'         => 'KTP Ibu wajib diunggah!',
            'bukti_pembayaran.required' => 'Bukti pembayaran wajib diunggah!',
        ]);

        // 3. Ambil atau buat record dokumen berdasarkan id_pendaftar
        $dokumen = DokumenPendaftar::firstOrNew(['id_pendaftar' => $id_pendaftar]);

        // Siapkan array data yang akan di-update
        // Kecualikan file-file yang akan diproses manual agar tidak error saat mass assignment
        $dataToUpdate = $request->except([
            'kk', 'akta', 'ktp_ayah', 'ktp_ibu', 'skl', 'pas_foto', 
            'kps', 'kks', 'kip', 'bukti_pembayaran', 'berkas_bantuan'
        ]);

        // 4. Proses Upload Dokumen Umum
        $dokumenUmum = ['kk', 'akta', 'ktp_ayah', 'ktp_ibu', 'skl', 'pas_foto', 'bukti_pembayaran'];
        foreach ($dokumenUmum as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($dokumen->$field) {
                    Storage::disk('public')->delete($dokumen->$field);
                }
                $dataToUpdate[$field] = $request->file($field)->store('dokumen/' . $field, 'public');
            }
        }

        // 5. Proses Logic Bantuan (KPS / KKS / KIP)
        $listBantuan = ['kps', 'kks', 'kip'];

        if ($request->is_penerima_bantuan == 'Ya') {
            $dataToUpdate['is_penerima_bantuan'] = 'Ya';
            $jenisDipilih = $request->jenis_bantuan ?? []; // Berbentuk array, misal: ['kip']

            foreach ($listBantuan as $b) {
                // Jika jenis bantuan tidak dicentang lagi oleh user, hapus filenya
                if (!in_array($b, $jenisDipilih) && $dokumen->$b) {
                    Storage::disk('public')->delete($dokumen->$b);
                    $dataToUpdate[$b] = null;
                }

                // Jika dipilih dan ada file satuan khusus untuk bantuan tersebut (atau file umum berkas_bantuan)
                if (in_array($b, $jenisDipilih) && $request->hasFile($b)) {
                    if ($dokumen->$b) {
                        Storage::disk('public')->delete($dokumen->$b);
                    }
                    $dataToUpdate[$b] = $request->file($b)->store('dokumen/bantuan', 'public');
                }
            }

            // Tangani jika menggunakan satu input global 'berkas_bantuan' tapi memilih jenis bantuan tertentu
            if ($request->hasFile('berkas_bantuan')) {
                $pathBantuan = $request->file('berkas_bantuan')->store('dokumen/bantuan', 'public');
                // Masukkan ke kolom pertama dari jenis yang dipilih, atau default ke 'kps'
                $tujuanBantuan = !empty($jenisDipilih) ? $jenisDipilih[0] : 'kps';
                
                if ($dokumen->$tujuanBantuan) {
                    Storage::disk('public')->delete($dokumen->$tujuanBantuan);
                }
                $dataToUpdate[$tujuanBantuan] = $pathBantuan;
            }

            // Simpan pilihan jenis bantuan menjadi format JSON
            $dataToUpdate['jenis_bantuan'] = json_encode($jenisDipilih);

        } else {
            // Jika memilih 'Tidak', bersihkan semua data bantuan
            $dataToUpdate['jenis_bantuan'] = null;
            $dataToUpdate['is_penerima_bantuan'] = 'Tidak';
            foreach ($listBantuan as $b) {
                if ($dokumen->$b) {
                    Storage::disk('public')->delete($dokumen->$b);
                }
                $dataToUpdate[$b] = null;
            }
        }
        // Set status lengkap menjadi 1 karena berkas berhasil diunggah
    $dataToUpdate['is_lengkap'] = 1;

    // Pastikan updated_at selalu terupdate waktu sekarang
    $dataToUpdate['updated_at'] = now();

    // Jika record baru dan created_at masih kosong, isi dengan waktu sekarang
    if (!$dokumen->exists && empty($dokumen->created_at)) {
        $dataToUpdate['created_at'] = now();
    }

    // Simpan permanen ke database
    $dokumen->fill($dataToUpdate);
    $dokumen->save();

       // Ubah dari 'dashboard_siswa' menjadi route kartu ucapan
        return redirect()->route('kartu_ucapan')->with('success', 'Pendaftaran berhasil diselesaikan!');
    }

    public function create()
    {
        // Tampilkan view form unggah berkas
        return view('unggah_berkas'); 
    }

    // Ganti SATU dokumen aja (dipakai di halaman Berkas Pendaftaran, tombol "Ganti"/"Unggah Ulang")
    // Beda dari store() di atas: yang ini nggak mewajibkan semua dokumen lain ikut diisi,
    // dan hasilnya JSON (bukan redirect), karena dipanggil lewat fetch() dari JS.
    public function updateSatuBerkas(Request $request)
    {
        $pendaftar = Pendaftar::where('id_user', auth()->id())->first();

        if (!$pendaftar) {
            return response()->json(['message' => 'Data pendaftaran tidak ditemukan.'], 404);
        }

        $kolomValid = ['kk', 'akta', 'ktp_ayah', 'ktp_ibu', 'skl', 'pas_foto', 'kip', 'bukti_pembayaran'];

        $validated = $request->validate([
            'jenis_dokumen' => ['required', \Illuminate\Validation\Rule::in($kolomValid)],
            'file' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $kolom = $validated['jenis_dokumen'];

        $dokumen = DokumenPendaftar::firstOrNew(['id_pendaftar' => $pendaftar->id_pendaftar]);

        // Hapus file lama kalau ada, biar storage nggak numpuk file nggak kepake
        if ($dokumen->$kolom) {
            Storage::disk('public')->delete($dokumen->$kolom);
        }

        $path = $request->file('file')->store('dokumen/' . $kolom, 'public');

        if (!$dokumen->exists) {
            $dokumen->id_pendaftar = $pendaftar->id_pendaftar;
            $dokumen->created_at = now();
        }
        $dokumen->$kolom = $path;
        $dokumen->updated_at = now();
        $dokumen->save();

        // Dokumen yang baru diganti otomatis balik ke status "belum dicek" lagi,
        // supaya admin tahu ini perlu direview ulang.
        $kolomCekMap = [
            'kk' => 'cek_kk', 'akta' => 'cek_akte', 'ktp_ayah' => 'cek_ktp_ayah',
            'ktp_ibu' => 'cek_ktp_ibu', 'skl' => 'cek_skl', 'pas_foto' => 'cek_pas_foto',
            'kip' => 'cek_kip', 'bukti_pembayaran' => 'cek_bukti_pembayaran',
        ];
        $kolomCek = $kolomCekMap[$kolom] ?? null;
        if ($kolomCek) {
            \App\Models\Verifikasi::where('id_pendaftar', $pendaftar->id_pendaftar)
                ->update([$kolomCek => false]);
        }

        return response()->json([
            'message' => 'Berkas berhasil diperbarui.',
            'url' => url('storage') . '/' . $path,
        ]);
    }
}