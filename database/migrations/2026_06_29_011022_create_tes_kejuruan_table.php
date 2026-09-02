<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tes_kejuruan', function (Blueprint $table) {
            $table->id('id_tes');
            $table->unsignedBigInteger('id_pendaftar');
            $table->string('jenis_tes', 50);
            $table->integer('hasil_tes')->nullable();
            
            $table->foreign('id_pendaftar')->references('id_pendaftar')->on('pendaftar')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('tes_kejuruan');
    }
};