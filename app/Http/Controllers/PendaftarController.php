<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\Verifikasi;
use Carbon\Carbon;
use App\Models\DataOrangTua;
use Illuminate\Support\Arr; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Validation\Rule;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;

class PendaftarController extends Controller
{
    // Buat nampilin form - Biarin kosong dulu
    public function create() {
        $jurusan = Jurusan::all();
        return view('pendaftar.daftar', compact('jurusan'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        // DATA SISWA - yg udah lu tulis
        'nama_lengkap' => 'required|max:100',
        'nisn' => 'required|unique:pendaftar,nisn|max:20',
        'tempat_lahir' => 'required|max:50',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'asal_sekolah' => 'required|max:100',
        'alamat_lengkap' => 'required',
        'rt' => 'nullable|string|max:3',
        'rw' => 'nullable|string|max:3',
        'desa' => 'nullable|string|max:100',
        'kecamatan' => 'nullable|string|max:100',
        'kabupaten' => 'nullable|string|max:100',
        'provinsi' => 'nullable|string|max:100',
        'kode_pos' => 'nullable|string|digits:5',
        'no_hp' => 'required|max:15',
        'tinggi_badan' => 'nullable|numeric|between:50,250',
        'berat_badan' => 'nullable|numeric|between:10,200',
        'jumlah_saudara_kandung' => 'nullable|integer|min:0|max:20',
        'jurusan_pilihan_1'   => 'required|string',
        'jurusan_pilihan_2'   => 'required|string|different:jurusan_pilihan_1',
        'kebutuhan_khusus'    => 'required|string',
        'jenis_tinggal'       => 'nullable|string',
        'is_penerima_bantuan' => 'required|string',
        'agama' => 'nullable|string|max:50',
        'alat_transportasi_ke_sekolah' => 'nullable|string|max:50',
        'jarak_ke_sekolah' => 'nullable|string|max:50',
        'gelombang' => 'required|string',
        'metode_pembayaran' => 'nullable|string',
        
        // DATA AYAH
        'nama_ayah' => 'nullable|string|max:100',
        'ayah_kebutuhan_khusus' => 'nullable|in:ya,tidak',
        'pekerjaan_ayah' => 'nullable|string|max:50',
        'pendidikan_terakhir_ayah' => 'nullable|string|max:30',
        'penghasilan_ayah_bulanan' => 'nullable|string|max:30',
        'no_hp_ayah' => 'nullable|string|max:30',
        'tahun_lahir_ayah' => 'nullable|string|max:30',
        
        
        
        // DATA IBU
        'nama_ibu' => 'nullable|string|max:100',
        'ibu_kebutuhan_khusus' => 'nullable|in:ya,tidak',
        'pekerjaan_ibu' => 'nullable|string|max:50',
        'pendidikan_terakhir_ibu' => 'nullable|string|max:30',
        'penghasilan_ibu_bulanan' => 'nullable|string|max:30',
        'no_hp_ibu' => 'nullable|string|max:30',
        'tahun_lahir_ibu' => 'nullable|string|max:30',
        
        // DATA WALI
        'nama_wali' => 'nullable|string|max:100',
        'pekerjaan_wali' => 'nullable|string|max:50',
        'penghasilan_wali_bulanan' => 'nullable|string|max:30',
        'pendidikan_terakhir_wali' => 'nullable|string|max:30',
        'no_hp_wali' => 'nullable|string|max:30',
    ]);

    // WAJIB PAKE TRANSACTION BIAR KALO GAGAL = ROLLBACK 2 TABEL
    DB::beginTransaction();
    try {
        // 1. AMBIL DATA SISWA DOANG, BUANG DATA ORTU/WALI
        $dataSiswa = Arr::except($validated, [
            'nama_ayah', 'ayah_kebutuhan_khusus', 'pekerjaan_ayah', 'pendidikan_terakhir_ayah', 'penghasilan_ayah_bulanan', 'no_hp_ayah', 'tahun_lahir_ayah',
            'nama_ibu', 'ibu_kebutuhan_khusus', 'pekerjaan_ibu', 'pendidikan_terakhir_ibu', 'penghasilan_ibu_bulanan', 'no_hp_ibu', 'tahun_lahir_ibu',
            'nama_wali', 'pekerjaan_wali', 'penghasilan_wali_bulanan', 'pendidikan_terakhir_wali', 'no_hp_wali',
        ]);
        $dataSiswa['id_user'] = Auth::id(); 
    $dataSiswa['status_pendaftaran'] = 'Baru';
    $dataSiswa['status_verifikasi'] = 'menunggu';
    // Cek pilihan gelombang dari form
    if (isset($dataSiswa['gelombang']) && $dataSiswa['gelombang'] === 'Gelombang 1') {
        // Jika Gelombang 1, otomatis set metode pembayarannya jadi Gratis
        $dataSiswa['metode_pembayaran'] = 'Gratis';
    } else {
        // Jika Gelombang 2, ambil data metode pembayaran yang dipilih siswa dari dropdown
        $dataSiswa['metode_pembayaran'] = $request->input('metode_pembayaran');
    }

    // Simpan ke tabel pendaftar (HANYA SEKALI DI SINI)
    $pendaftar = Pendaftar::create($dataSiswa); 

    // 3. Ambil data ortu
    $dataOrtu = Arr::only($validated, [
        'nama_ayah', 'ayah_kebutuhan_khusus', 'pekerjaan_ayah', 'pendidikan_terakhir_ayah', 'penghasilan_ayah_bulanan', 'no_hp_ayah', 'tahun_lahir_ayah',
        'nama_ibu', 'ibu_kebutuhan_khusus', 'pekerjaan_ibu', 'pendidikan_terakhir_ibu', 'penghasilan_ibu_bulanan', 'no_hp_ibu', 'tahun_lahir_ibu',
        'nama_wali', 'pekerjaan_wali', 'penghasilan_wali_bulanan', 'pendidikan_terakhir_wali', 'no_hp_wali'
    ]);
    $dataOrtu['id_pendaftar'] = $pendaftar->id_pendaftar;
    DataOrangTua::create($dataOrtu);

    // 4. Inisialisasi dokumen awal
    \App\Models\DokumenPendaftar::create([
        'id_pendaftar' => $pendaftar->id_pendaftar,
        'is_penerima_bantuan' => $request->is_penerima_bantuan ?? 'Tidak',
    ]);

} catch (\Exception $e) {
    DB::rollBack();
    return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
}

DB::commit(); // KUNCI KALO 2-2NYA SUKSES
return redirect('/unggah-berkas')->with('success', 'Pendaftaran berhasil!');
}
public function tampilkanKartuUcapan()
{
    // Ambil data pendaftar berdasarkan user yang sedang login
    $pendaftar = \App\Models\Pendaftar::where('id_user', auth()->user()->id_user)->first();

    return view('kartu_ucapan', compact('pendaftar'));
}
    // Buat liat semua pendaftar - buat admin
    public function index() {
        $pendaftar = Pendaftar::with(['jurusanPilihan2', 'jurusanPilihan2'])->get();
        return view('pendaftar.index', compact('pendaftar'));
    }
public function cetakKartu()
{
    $user = auth()->user();
    
    // Ambil data pendaftar berdasarkan user yang sedang login
    $pendaftar = \App\Models\Pendaftar::with(['dokumen', 'jurusanPilihan1'])
                 ->where('id_user', $user?->id_user) // sesuaikan kolom relasi user di tabel pendaftar
                 ->first();

    // Pastikan $pendaftar ikut dikirim ke view pakai compact('pendaftar')
    return view('cetak_kartu', compact('pendaftar'));
}
public function berkasPendaftaran()
{
    $user = auth()->user();
    $pendaftar = \App\Models\Pendaftar::with(['dokumen', 'jurusanPilihan1'])
                 ->where('id_user', $user->id_user)
                 ->first();

    return view('berkas_pendaftaran', compact('pendaftar'));
}
// Menampilkan halaman form edit biodata
public function edit()
{
    $user = auth()->user();
    $pendaftar = \App\Models\Pendaftar::where('id_user', $user->id_user)->first();
    
    // Ambil data jurusan juga kalau dibutuhkan di select option form
    $jurusan = \App\Models\Jurusan::all();

    return view('edit_data_siswa', compact('pendaftar', 'jurusan'));
}

public function update(Request $request)
{
    $user = auth()->user();
    
    // Ambil data pendaftar berdasarkan user yang sedang login
    $pendaftar = Pendaftar::where('id_user', $user->id_user)->firstOrFail();

    // 1. Validasi semua data
    $validatedData = $request->validate([
        'nama_lengkap' => 'required|max:100',
        'nisn' => [
            'required',
            'max:20',
            Rule::unique('pendaftar', 'nisn')->ignore($pendaftar->id),
        ],
        'tempat_lahir' => 'required|max:50',
        'tanggal_lahir' => 'required|date',
        'jenis_kelamin' => 'required|in:L,P',
        'asal_sekolah' => 'required|max:100',
        'alamat_lengkap' => 'required',
        'rt' => 'nullable|string|max:3',
        'rw' => 'nullable|string|max:3',
        'desa' => 'nullable|string|max:100',
        'kecamatan' => 'nullable|string|max:100',
        'kabupaten' => 'nullable|string|max:100',
        'provinsi' => 'nullable|string|max:100',
        'kode_pos' => 'nullable|string|digits:5',
        'no_hp' => 'required|max:15',
        'tinggi_badan' => 'nullable|numeric|between:50,250',
        'berat_badan' => 'nullable|numeric|between:10,200',
        'jumlah_saudara_kandung' => 'nullable|integer|min:0|max:20',
        'jurusan_pilihan_1'   => 'required|string',
        'jurusan_pilihan_2'   => 'required|string|different:jurusan_pilihan_1',
        'kebutuhan_khusus'    => 'required|string',
        'jenis_tinggal'       => 'nullable|string',
        'is_penerima_bantuan' => 'required|string',
        'agama' => 'nullable|string|max:50',
        'alat_transportasi_ke_sekolah' => 'nullable|string|max:50',
        'jarak_ke_sekolah' => 'nullable|string|max:50',
        
        // DATA AYAH
        'nama_ayah' => 'nullable|string|max:100',
        'ayah_kebutuhan_khusus' => 'nullable|in:Ya,Tidak',
        'pekerjaan_ayah' => 'nullable|string|max:50',
        'pendidikan_terakhir_ayah' => 'nullable|string|max:30',
        'penghasilan_ayah_bulanan' => 'nullable|string|max:30',
        'no_hp_ayah' => 'nullable|string|max:30',
        'tahun_lahir_ayah' => 'nullable|string|max:30',
        
        // DATA IBU
        'nama_ibu' => 'nullable|string|max:100',
        'ibu_kebutuhan_khusus' => 'nullable|in:Ya,Tidak',
        'pekerjaan_ibu' => 'nullable|string|max:50',
        'pendidikan_terakhir_ibu' => 'nullable|string|max:30',
        'penghasilan_ibu_bulanan' => 'nullable|string|max:30',
        'no_hp_ibu' => 'nullable|string|max:30',
        'tahun_lahir_ibu' => 'nullable|string|max:30',
        
        // DATA WALI
        'nama_wali' => 'nullable|string|max:100',
        'pekerjaan_wali' => 'nullable|string|max:50',
        'penghasilan_wali_bulanan' => 'nullable|string|max:30',
        'pendidikan_terakhir_wali' => 'nullable|string|max:30',
        'no_hp_wali' => 'nullable|string|max:30',
    ]);

    // 2. Langsung update ke database SEKALI JALAN!
    $pendaftar->update($validatedData);

    return redirect()->back()->with('success', 'Biodata berhasil diperbarui!');
}

//---- KHUSUS ADMIN ----\\
    // ===== TEMPEL FUNCTION BARU MULAI DARI SINI =====
    public function listForAdmin()
    {
        $data = Pendaftar::with(['dokumen', 'verifikasi'])->get()->map(function ($siswa) {
            $dokumen = $siswa->dokumen;
            $verif = $siswa->verifikasi;
            $fields = ['kk' => 'cek_kk', 'akta' => 'cek_akte', 'ktp_ayah' => 'cek_ktp_ayah', 'ktp_ibu' => 'cek_ktp_ibu', 'skl' => 'cek_skl'];

            $lengkap = 0;
            $checklist_upload = [];
            $checklist_admin = [];

            foreach ($fields as $namaFile => $namaKolom) {
                $sudahUpload = $dokumen && $dokumen->$namaFile? true : false;
                $dicentangAdmin = $verif && $verif->$namaKolom? true : false;

                $checklist_upload[$namaFile] = $sudahUpload;
                $checklist_admin[$namaFile] = $dicentangAdmin;

                if ($sudahUpload) $lengkap++;
            }

            return [
                'id_pendaftar' => $siswa->id_pendaftar,
                'no_pendaftaran' => $siswa->no_pendaftaran,
                'nama_lengkap' => $siswa->nama_lengkap,
                'nisn' => $siswa->nisn,
                'asal_sekolah' => $siswa->asal_sekolah,
                'status_verifikasi' => $verif->status_verifikasi?? 'menunggu',
                'progres_berkas' => "$lengkap/5",
                'dokumen_lengkap' => $lengkap == 5,
                'sudah_upload' => $checklist_upload,
                'dicek_admin' => $checklist_admin,
                'tanggal_verifikasi' => $verif->tanggal_verifikasi?? null,
            ];
        });

        return response()->json($data, 200);
    }
    public function detailAdmin($id)
{
    $pendaftar = Pendaftar::with(['dokumen', 'verifikasi'])->find($id);
    
    if (!$pendaftar) {
        return response()->json(['message' => 'Siswa tidak ditemukan'], 404);
    }

    $dokumen = $pendaftar->dokumen;
    $verif = $pendaftar->verifikasi;
    $baseUrl = url('storage');
    
    $fields = [
        'kk' => 'cek_kk', 
        'akta' => 'cek_akte', 
        'ktp_ayah' => 'cek_ktp_ayah', 
        'ktp_ibu' => 'cek_ktp_ibu', 
        'skl' => 'cek_skl',
        'pas_foto' => 'cek_pas_foto',
        
    ];
    
    $dokumenData = [];
    foreach ($fields as $namaFile => $namaKolom) {
        $path = $dokumen->$namaFile ?? null;
        $dokumenData[$namaFile] = [
            'sudah_upload' => $path ? true : false,
            'url' => $path ? $baseUrl . '/' . $path : null,
            'dicentang_admin' => $verif->$namaKolom ?? false
        ];
    }

    // KIP/KKS/PKH digabung jadi satu slot di tampilan, tapi datanya
    // bisa ada di salah satu dari 3 kolom terpisah (kip, kks, kps).
    $pathKip = $dokumen->kip ?? $dokumen->kks ?? $dokumen->kps ?? null;
    $dokumenData['kip'] = [
        'sudah_upload' => $pathKip ? true : false,
        'url' => $pathKip ? $baseUrl . '/' . $pathKip : null,
        'dicentang_admin' => $verif->cek_kip ?? false
    ];

    // Bukti Transfer Pembayaran
    $pathBukti = $dokumen->bukti_pembayaran ?? null;
    $dokumenData['bukti_pembayaran'] = [
        'sudah_upload' => $pathBukti ? true : false,
        'url' => $pathBukti ? $baseUrl . '/' . $pathBukti : null,
        'dicentang_admin' => $verif->cek_bukti_pembayaran ?? false
    ];

    return response()->json([
        'id_pendaftar' => $pendaftar->id_pendaftar,
        'nama_lengkap' => $pendaftar->nama_lengkap,
        'status_verifikasi' => $verif->status_verifikasi ?? 'menunggu',
        'tanggal_verifikasi' => $verif->tanggal_verifikasi ?? null,
        'dokumen' => $dokumenData
    ], 200);
}
public function verifikasiUpdate(Request $request, $id)
{
    $request->validate([
    'cek_kk' => 'boolean',
    'cek_akte' => 'boolean',
    'cek_ktp_ayah' => 'boolean',
    'cek_ktp_ibu' => 'boolean',
    'cek_skl' => 'boolean',
    'cek_pas_foto' => 'boolean',
    'catatan_revisi' => 'nullable|string',
    'status_verifikasi' => [
        'required',
        Rule::in(['menunggu','lengkap','kurang','revisi','ditolak'])
    ]
]);
$request->merge([
    'status_verifikasi' => strtolower($request->status_verifikasi)
]);
    // Kalo belum ada, bikin dulu sekalian isi id_admin
    $verifikasi = Verifikasi::updateOrCreate(
        ['id_pendaftar' => $id], // Syarat nyari data
        [ // Data yang diisi/update
            'id_user' => auth()->user()->id_user,
            'cek_kk' => $request->cek_kk ?? false,
            'cek_akte' => $request->cek_akte ?? false,
            'cek_ktp_ayah' => $request->cek_ktp_ayah ?? false,
            'cek_ktp_ibu' => $request->cek_ktp_ibu ?? false,
            'cek_skl' => $request->cek_skl ?? false,
            'cek_pas_foto' => $request->cek_pas_foto ?? false,
            'status_verifikasi' => $request->status_verifikasi,
            'tanggal_verifikasi' => now()
        ]
    );

    // Sinkronkan juga ke tabel pendaftar, supaya halaman lain yang baca
    // langsung dari kolom pendaftar.status_verifikasi (misal Data Pendaftar,
    // dashboard siswa) ikut update tanpa perlu diubah satu-satu.
    Pendaftar::where('id_pendaftar', $id)->update([
        'status_verifikasi' => $request->status_verifikasi,
        'catatan_revisi' => $request->catatan_revisi,
    ]);

    return response()->json([
        'message' => 'Verifikasi berhasil diupdate',
        'data' => $verifikasi
    ], 200);
}

public function pengumuman()
{
    // Mengambil semua daftar pengumuman, diurutkan dari yang terbaru
    $dataPengumuman = Pengumuman::orderBy('tanggal', 'desc')->get();

    return response()->json([
        'success' => true,
        'message' => 'Daftar pengumuman berhasil dimuat',
        'data' => $dataPengumuman
    ], 200);
}

public function jurusanPilihan1()
{
    return $this->belongsTo(Jurusan::class, 'jurusan_pilihan_1', 'id_jurusan');
}

public function jurusanPilihan2()
{
    return $this->belongsTo(Jurusan::class, 'jurusan_pilihan_2', 'id_jurusan');
}

} // <-- INI KURUNG KURAWAL PENUTUP CLASS PALING AKHIR