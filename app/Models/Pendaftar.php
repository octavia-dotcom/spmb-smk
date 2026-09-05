<?php

namespace App\Models;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'no_pendaftaran',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',  // BARU
        'jenis_kelamin',  // BARU
        'asal_sekolah',
        'agama',
        'tinggi_badan',
        'berat_badan',
        'alamat_lengkap',
        'rt',
        'rw', 
        'desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'jenis_tinggal',
        'kebutuhan_khusus',
        'is_penerima_bantuan',
        'alat_transportasi_ke_sekolah',
        'jumlah_saudara_kandung',
        'no_hp',        
        'jurusan_pilihan_1',
        'jurusan_pilihan_2',
        'jarak_ke_sekolah',
        'metode_pembayaran',
        'gelombang',
        'status_pendaftaran',
        'status_verifikasi',
        'status_seleksi',
        'nilai_rata_akhir',
        'catatan_revisi'
    ]; // <-- PENUTUP $fillable SAMPE SINI

    // ===== TEMPEL MULAI DARI SINI KE BAWAH =====
    public function dataOrangTua()
    {
        return $this->hasOne(DataOrangTua::class, 'id_pendaftar', 'id_pendaftar');
    }
    public function dokumen()
    {
        return $this->hasOne(DokumenPendaftar::class, 'id_pendaftar', 'id_pendaftar');
    }
    public function verifikasi()
    {
        return $this->hasOne(Verifikasi::class, 'id_pendaftar', 'id_pendaftar');
    }
    // Taruh di bawah function verifikasi()

    public function jurusanPilihan1()
{
    return $this->belongsTo(Jurusan::class, 'jurusan_pilihan_1', 'kode_jurusan');
}

public function jurusanPilihan2()
{
    return $this->belongsTo(Jurusan::class, 'jurusan_pilihan_2', 'kode_jurusan');
}
}