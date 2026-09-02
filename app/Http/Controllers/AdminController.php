<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Jurusan;
use App\Models\DataOrangTua;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
{
    $totalPendaftar = Pendaftar::count();

    // Dihitung dari tabel "verifikasi" (yang beneran diupdate lewat halaman Verifikasi Berkas),
    // bukan kolom status_verifikasi di tabel pendaftar yang gak pernah ke-update alur aplikasi.
    $berkasDiverifikasi = Pendaftar::whereHas('verifikasi', function ($q) {
        $q->where('status_verifikasi', 'lengkap');
    })->count();

    $sedangDiproses = Pendaftar::where(function ($q) {
        $q->whereDoesntHave('verifikasi')
          ->orWhereHas('verifikasi', function ($qq) {
              $qq->where('status_verifikasi', 'menunggu');
          });
    })->count();

    // Diterima dihitung dari hasil seleksi kelulusan, bukan status_pendaftaran (yang gak pernah diupdate otomatis)
    $diterima = Pendaftar::where('status_seleksi', 'Lulus')->count();

    $pendaftarTerbaru = Pendaftar::with('verifikasi')->latest()->take(5)->get();

    // BARU: hitung jumlah pendaftar per jurusan pilihan 1 buat grafik
    $chartJurusanCounts = [
        'PPLG' => Pendaftar::where('jurusan_pilihan_1', 'PPLG')->count(),
        'BCF'  => Pendaftar::where('jurusan_pilihan_1', 'BCF')->count(),
        'MPLB' => Pendaftar::where('jurusan_pilihan_1', 'MPLB')->count(),
    ];

    return view('dashboard_admin', compact(
        'totalPendaftar',
        'berkasDiverifikasi',
        'sedangDiproses',
        'diterima',
        'pendaftarTerbaru',
        'chartJurusanCounts'   // <-- ini yang tadinya belum dikirim
    ));
}
    public function listPendaftar()
    {
        $pendaftarTerbaru = Pendaftar::all();

        return view('list_pendaftar', compact('pendaftarTerbaru'));
    }

    public function verifikasiBerkas()
    {
        $pendaftar = Pendaftar::with('verifikasi')->select(
            'id_pendaftar',
            'no_pendaftaran',
            'nama_lengkap',
            'asal_sekolah',
            'nisn',
            'catatan_revisi'
        )->get()->map(function ($siswa) {
            return (object) [
                'id' => $siswa->id_pendaftar,
                'id_pendaftar' => $siswa->id_pendaftar,
                'no_pendaftaran' => $siswa->no_pendaftaran,
                'nama_lengkap' => $siswa->nama_lengkap,
                'asal_sekolah' => $siswa->asal_sekolah,
                'nisn' => $siswa->nisn,
                'status_verifikasi' => $siswa->verifikasi->status_verifikasi ?? 'menunggu',
                'catatan_revisi' => $siswa->catatan_revisi,
            ];
        });

        return view('verifikasi_berkas', compact('pendaftar'));
    }

    public function seleksiKelulusan()
    {
        $pendaftar = Pendaftar::select(
            'id_pendaftar',
            'no_pendaftaran',
            'nama_lengkap',
            'jurusan_pilihan_1',
            'gelombang',
            'nilai_akhir',
            'status_seleksi',
            'status_verifikasi'
        )->get();

        return view('seleksi_kelulusan', compact('pendaftar'));
    }

    // POST /seleksi_kelulusan/{id}/update
    public function updateSeleksi(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        $validated = $request->validate([
            'nilai_akhir' => 'nullable|numeric|min:0|max:100',
            'status_seleksi' => ['required', Rule::in(['Lulus', 'Tidak Lulus', 'Cadangan', 'Belum Diproses'])],
        ]);

        $pendaftar->update($validated);

        return response()->json(['message' => 'Status seleksi berhasil diupdate', 'data' => $pendaftar]);
    }

    // GET /profil_admin
    public function profilAdmin()
    {
        $admin = Auth::user();
        return view('profil_admin', compact('admin'));
    }

    // POST /profil_admin/update
    public function updateProfilAdmin(Request $request)
    {
        $admin = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore($admin->id_user, 'id_user')],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($admin->id_user, 'id_user')],
            'no_hp' => 'nullable|string|max:15',
        ]);

        $admin->update($validated);

        return redirect()->back()->with('success', 'Informasi profil admin berhasil diperbarui!');
    }

    // POST /profil_admin/password
    public function updatePasswordAdmin(Request $request)
    {
        $admin = Auth::user();

        $validated = $request->validate([
            'password_lama' => 'required|string',
            'password_baru' => 'required|string|min:6|confirmed',
        ]);

        if (!Hash::check($validated['password_lama'], $admin->password)) {
            return redirect()->back()->withErrors(['password_lama' => 'Kata sandi lama tidak cocok.']);
        }

        $admin->update(['password' => Hash::make($validated['password_baru'])]);

        return redirect()->back()->with('success', 'Kata sandi admin berhasil diperbarui!');
    }

    // GET /tambah_pendaftar
    public function tambahPendaftar()
    {
        return view('tambah_pendaftar');
    }

    // POST /tambah_pendaftar
    public function storePendaftar(Request $request)
    {
        $validated = $request->validate([
            // DATA SISWA
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

        try {
            $pendaftar = DB::transaction(function () use ($validated) {

                $noPendaftaran = 'SPMB-' . date('Y') . '-' . str_pad(
                    (Pendaftar::max('id_pendaftar') ?? 0) + 1,
                    6,
                    '0',
                    STR_PAD_LEFT
                );

                $pendaftar = Pendaftar::create([
                    'no_pendaftaran' => $noPendaftaran,
                    'nama_lengkap' => $validated['nama_lengkap'],
                    'nisn' => $validated['nisn'],
                    'tempat_lahir' => $validated['tempat_lahir'],
                    'tanggal_lahir' => $validated['tanggal_lahir'],
                    'jenis_kelamin' => $validated['jenis_kelamin'],
                    'asal_sekolah' => $validated['asal_sekolah'],
                    'alamat_lengkap' => $validated['alamat_lengkap'],
                    'rt' => $validated['rt'] ?? null,
                    'rw' => $validated['rw'] ?? null,
                    'desa' => $validated['desa'] ?? null,
                    'kecamatan' => $validated['kecamatan'] ?? null,
                    'kabupaten' => $validated['kabupaten'] ?? null,
                    'provinsi' => $validated['provinsi'] ?? null,
                    'kode_pos' => $validated['kode_pos'] ?? null,
                    'no_hp' => $validated['no_hp'],
                    'tinggi_badan' => $validated['tinggi_badan'] ?? null,
                    'berat_badan' => $validated['berat_badan'] ?? null,
                    'jumlah_saudara_kandung' => $validated['jumlah_saudara_kandung'] ?? null,
                    'jurusan_pilihan_1' => $validated['jurusan_pilihan_1'],
                    'jurusan_pilihan_2' => $validated['jurusan_pilihan_2'],
                    'kebutuhan_khusus' => $validated['kebutuhan_khusus'],
                    'jenis_tinggal' => $validated['jenis_tinggal'] ?? null,
                    'is_penerima_bantuan' => $validated['is_penerima_bantuan'],
                    'agama' => $validated['agama'] ?? null,
                    'alat_transportasi_ke_sekolah' => $validated['alat_transportasi_ke_sekolah'] ?? null,
                    'jarak_ke_sekolah' => $validated['jarak_ke_sekolah'] ?? null,
                    'gelombang' => $validated['gelombang'],
                    'metode_pembayaran' => $validated['metode_pembayaran'] ?? null,

                    'status_pendaftaran' => 'Baru',
                    'status_verifikasi'  => 'menunggu',
                ]);

                DataOrangTua::create([
                    'id_pendaftar' => $pendaftar->id_pendaftar,

                    'nama_ayah' => $validated['nama_ayah'] ?? null,
                    'ayah_kebutuhan_khusus' => $validated['ayah_kebutuhan_khusus'] ?? 'Tidak',
                    'pekerjaan_ayah' => $validated['pekerjaan_ayah'] ?? null,
                    'pendidikan_terakhir_ayah' => $validated['pendidikan_terakhir_ayah'] ?? null,
                    'penghasilan_ayah_bulanan' => $validated['penghasilan_ayah_bulanan'] ?? null,
                    'no_hp_ayah' => $validated['no_hp_ayah'] ?? null,
                    'tahun_lahir_ayah' => $validated['tahun_lahir_ayah'] ?? null,

                    'nama_ibu' => $validated['nama_ibu'] ?? null,
                    'ibu_kebutuhan_khusus' => $validated['ibu_kebutuhan_khusus'] ?? 'Tidak',
                    'pekerjaan_ibu' => $validated['pekerjaan_ibu'] ?? null,
                    'pendidikan_terakhir_ibu' => $validated['pendidikan_terakhir_ibu'] ?? null,
                    'penghasilan_ibu_bulanan' => $validated['penghasilan_ibu_bulanan'] ?? null,
                    'no_hp_ibu' => $validated['no_hp_ibu'] ?? null,
                    'tahun_lahir_ibu' => $validated['tahun_lahir_ibu'] ?? null,

                    'nama_wali' => $validated['nama_wali'] ?? null,
                    'pekerjaan_wali' => $validated['pekerjaan_wali'] ?? null,
                    'penghasilan_wali_bulanan' => $validated['penghasilan_wali_bulanan'] ?? null,
                    'pendidikan_terakhir_wali' => $validated['pendidikan_terakhir_wali'] ?? null,
                    'no_hp_wali' => $validated['no_hp_wali'] ?? null,
                ]);

                return $pendaftar;
            });

            return response()->json([
                'message' => 'Pendaftar baru berhasil ditambahkan!',
                'data'    => [
                    'id_pendaftar'   => $pendaftar->id_pendaftar,
                    'no_pendaftaran' => $pendaftar->no_pendaftaran,
                ],
            ], 201);

        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Gagal menyimpan data: ' . $e->getMessage(),
            ], 500);
        }
    }

    // GET /detail_pendaftar/{id}
    public function detailPendaftar($id)
    {
        $pendaftar = Pendaftar::with(['jurusanPilihan1', 'jurusanPilihan2'])
                     ->findOrFail($id);

        $dataOrangTua = DataOrangTua::where('id_pendaftar', $pendaftar->id_pendaftar)->first();

        return view('detail_pendaftar', compact('pendaftar', 'dataOrangTua'));
    }

    // GET /edit_pendaftar/{id}
    public function editPendaftar($id)
    {
        $pendaftar = Pendaftar::with(['jurusanPilihan1', 'jurusanPilihan2'])
                     ->findOrFail($id);

        $dataOrangTua = DataOrangTua::where('id_pendaftar', $pendaftar->id_pendaftar)->first();

        return view('edit_pendaftar', compact('pendaftar', 'dataOrangTua'));
    }

    // PUT /edit_pendaftar/{id}
    public function updatePendaftar(Request $request, $id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        // Validasi disesuaikan dengan field yang sama seperti storePendaftar()
        $validated = $request->validate([
            'nama_lengkap' => 'required|max:100',
            'nisn' => 'required|max:20|unique:pendaftar,nisn,' . $pendaftar->id_pendaftar . ',id_pendaftar',
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

            'nama_ayah' => 'nullable|string|max:100',
            'ayah_kebutuhan_khusus' => 'nullable|in:Ya,Tidak',
            'pekerjaan_ayah' => 'nullable|string|max:50',
            'pendidikan_terakhir_ayah' => 'nullable|string|max:30',
            'penghasilan_ayah_bulanan' => 'nullable|string|max:30',
            'no_hp_ayah' => 'nullable|string|max:30',
            'tahun_lahir_ayah' => 'nullable|string|max:30',

            'nama_ibu' => 'nullable|string|max:100',
            'ibu_kebutuhan_khusus' => 'nullable|in:Ya,Tidak',
            'pekerjaan_ibu' => 'nullable|string|max:50',
            'pendidikan_terakhir_ibu' => 'nullable|string|max:30',
            'penghasilan_ibu_bulanan' => 'nullable|string|max:30',
            'no_hp_ibu' => 'nullable|string|max:30',
            'tahun_lahir_ibu' => 'nullable|string|max:30',

            'nama_wali' => 'nullable|string|max:100',
            'pekerjaan_wali' => 'nullable|string|max:50',
            'penghasilan_wali_bulanan' => 'nullable|string|max:30',
            'pendidikan_terakhir_wali' => 'nullable|string|max:30',
            'no_hp_wali' => 'nullable|string|max:30',
        ]);

        try {
            DB::transaction(function () use ($pendaftar, $validated) {
                $dataSiswa = collect($validated)->except([
                    'nama_ayah', 'ayah_kebutuhan_khusus', 'pekerjaan_ayah', 'pendidikan_terakhir_ayah', 'penghasilan_ayah_bulanan', 'no_hp_ayah', 'tahun_lahir_ayah',
                    'nama_ibu', 'ibu_kebutuhan_khusus', 'pekerjaan_ibu', 'pendidikan_terakhir_ibu', 'penghasilan_ibu_bulanan', 'no_hp_ibu', 'tahun_lahir_ibu',
                    'nama_wali', 'pekerjaan_wali', 'penghasilan_wali_bulanan', 'pendidikan_terakhir_wali', 'no_hp_wali',
                ])->toArray();

                $pendaftar->update($dataSiswa);

                $dataOrtu = collect($validated)->only([
                    'nama_ayah', 'ayah_kebutuhan_khusus', 'pekerjaan_ayah', 'pendidikan_terakhir_ayah', 'penghasilan_ayah_bulanan', 'no_hp_ayah', 'tahun_lahir_ayah',
                    'nama_ibu', 'ibu_kebutuhan_khusus', 'pekerjaan_ibu', 'pendidikan_terakhir_ibu', 'penghasilan_ibu_bulanan', 'no_hp_ibu', 'tahun_lahir_ibu',
                    'nama_wali', 'pekerjaan_wali', 'penghasilan_wali_bulanan', 'pendidikan_terakhir_wali', 'no_hp_wali',
                ])->toArray();

                DataOrangTua::updateOrCreate(
                    ['id_pendaftar' => $pendaftar->id_pendaftar],
                    $dataOrtu
                );
            });

            return redirect('/list_pendaftar')->with('success', 'Data pendaftar berhasil diperbarui!');

        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }
}