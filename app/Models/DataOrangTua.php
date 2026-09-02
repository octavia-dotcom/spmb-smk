<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataOrangTua extends Model
{
    protected $table = 'data_orang_tua';
    protected $primaryKey = 'id_orang_tua'; // PK lu bukan 'id' tapi 'id_orang_tua'
    public $timestamps = false; // Kalo tabel lu gak ada created_at & updated_at

    protected $fillable = [
        'id_pendaftar',
        
        // AYAH
        'nama_ayah',
        'ayah_kebutuhan_khusus', 
        'pekerjaan_ayah',
        'pendidikan_terakhir_ayah',
        'penghasilan_ayah_bulanan',
        'no_hp_ayah',
        'tahun_lahir_ayah',
        
        // IBU
        'nama_ibu',
        'ibu_kebutuhan_khusus',
        'pekerjaan_ibu', 
        'pendidikan_terakhir_ibu',
        'penghasilan_ibu_bulanan',
        'no_hp_ibu',
        'tahun_lahir_ibu',
        
        // WALI
        'nama_wali',
        'pekerjaan_wali',
        'penghasilan_wali_bulanan',
        'pendidikan_terakhir_wali',
        'no_hp_wali',
    ];

    // RELASI: Data ortu ini punya 1 pendaftar
    public function pendaftar() {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id_pendaftar');
    }
}