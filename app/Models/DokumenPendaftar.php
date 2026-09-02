<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPendaftar extends Model
{
    protected $table = 'dokumen_pendaftar';
    protected $primaryKey = 'id_dokumen'; // INI PENTING
    //public $timestamps = false;
    
    protected $fillable = [
        'id_pendaftar',
        'kk',
        'akta', 
        'ktp_ayah', 
        'ktp_ibu', 
        'skl',
        'pas_foto',
        'is_penerima_bantuan', 
        'jenis_bantuan', 
        'kps', 
        'kks', 
        'kip', 
        'bukti_pembayaran',
        'created_at',
        'updated_at',
        'is_lengkap'
    ];
}