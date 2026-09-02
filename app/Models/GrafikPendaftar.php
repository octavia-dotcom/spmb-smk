<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrafikPendaftar extends Model
{
    protected $table = 'grafik_pendaftar'; // nama tabel di DB
    protected $primaryKey = 'id_grafik'; // ganti kalau pk kamu beda. misal id_grafik
    protected $fillable = [
        'id_jurusan',
        'jumlah_pendaftar',
    ];

    public $timestamps = true; // karena ada created_at & updated_at

    // Relasi ke tabel jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
}