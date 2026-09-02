<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->date('tanggal_lahir')->after('tempat_lahir');
            $table->enum('jenis_kelamin', ['L', 'P'])->after('tanggal_lahir');
            $table->string('no_hp', 15)->after('alamat_lengkap');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropColumn(['tanggal_lahir', 'jenis_kelamin', 'no_hp']);
        });
    }
};