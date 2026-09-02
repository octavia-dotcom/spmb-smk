<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran');
            $table->unsignedBigInteger('id_pendaftar');
            $table->integer('jumlah_bayar');
            $table->date('tanggal_bayar');
            $table->string('status_konfirmasi', 20)->default('Belum');
            $table->unsignedBigInteger('id_admin')->nullable();
            
            $table->foreign('id_pendaftar')->references('id_pendaftar')->on('pendaftar')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('users_admin');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('pembayaran');
    }
};