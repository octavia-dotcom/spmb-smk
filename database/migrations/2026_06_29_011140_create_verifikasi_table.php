<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id('id_verifikasi');
            $table->unsignedBigInteger('id_pendaftar');
            $table->unsignedBigInteger('id_admin');
            
            $table->boolean('cek_kk')->default(false);
            $table->boolean('cek_akte')->default(false);
            $table->boolean('cek_ktp_ayah')->default(false);
            $table->boolean('cek_ktp_ibu')->default(false);
            $table->boolean('cek_ijazah')->default(false);
            $table->boolean('cek_skl')->default(false);
            
            $table->string('status_verifikasi', 20)->default('Proses');
            $table->dateTime('tanggal_verifikasi')->nullable();
            
            $table->foreign('id_pendaftar')->references('id_pendaftar')->on('pendaftar')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('users_admin');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('verifikasi');
    }
};