<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    protected $table = 'verifikasi';
    protected $primaryKey = 'id_verifikasi';
    
    // GANTI INI
    protected $fillable = [
        'id_pendaftar',
        'id_user', // tadinya id_admin
        'cek_kk', 'cek_akte', 'cek_ktp_ayah', 'cek_ktp_ibu', 'cek_skl','cek_pas_foto',
        'status_verifikasi', 'tanggal_verifikasi'
    ];

    // GANTI RELASI INI
    public function user() // tadinya admin()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function pendaftar()
    {
        return $this->belongsTo(Pendaftar::class, 'id_pendaftar', 'id_pendaftar');
    }
}