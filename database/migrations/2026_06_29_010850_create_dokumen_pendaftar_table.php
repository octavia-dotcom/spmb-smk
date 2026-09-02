<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pendaftar', function (Blueprint $table) {
            $table->id('id_pendaftar');
            $table->string('nama_lengkap', 100);
            $table->string('nisn', 20)->unique();
            $table->string('tempat_lahir', 50);
            $table->string('asal_sekolah', 100);
            $table->text('alamat_lengkap');
            
            $table->unsignedBigInteger('jurusan_utama');
            $table->unsignedBigInteger('jurusan_cadangan')->nullable();
            
            $table->string('status_pendaftaran', 20)->default('Baru');
            $table->string('status_verifikasi', 20)->default('Belum');
            $table->text('catatan_revisi')->nullable();
            
            $table->foreign('jurusan_utama')->references('id_jurusan')->on('jurusan');
            $table->foreign('jurusan_cadangan')->references('id_jurusan')->on('jurusan');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pendaftar');
    }
};