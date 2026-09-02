<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('grafik_pendaftar', function (Blueprint $table) {
            $table->id('id_grafik');
            $table->unsignedBigInteger('id_jurusan');
            $table->integer('jumlah_pendaftar')->default(0);
            
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('grafik_pendaftar');
    }
};