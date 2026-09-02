<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftar;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    public $timestamps = true;

    protected $fillable = [
        'nama_jurusan', 
        'kode_jurusan', 
        'deskripsi', 
        'kuota', 
        'biaya'
    ];

    protected $appends = ['terisi', 'sisa_kuota'];

    // Relasi: 1 jurusan dipake di pilihan 1 dan pilihan 2
    public function pendaftarPilihan1()
    {
        return $this->hasMany(Pendaftar::class, 'jurusan_pilihan_1', 'id_jurusan');
    }

    public function pendaftarPilihan2()
    {
        return $this->hasMany(Pendaftar::class, 'jurusan_pilihan_2', 'id_jurusan');
    }

    public function getTerisiAttribute()
{
    return $this->pendaftarPilihan1()->count() + 
           $this->pendaftarPilihan2()->count();
}

    public function getSisaKuotaAttribute()
    {
        return $this->kuota - $this->terisi;
    }
}