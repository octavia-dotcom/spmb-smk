<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Hapus foreign key pake nama kolom, biar Laravel yg cari namanya
        Schema::table('pendaftar', function (Blueprint $table) {
            // Drop pake array kolom, bukan nama constraint
            $table->dropForeign(['jurusan_utama']);
            $table->dropForeign(['jurusan_cadangan']);
        });

        // 2. Ubah data 0 jadi NULL dulu biar bisa nullable
        DB::table('pendaftar')->where('jurusan_utama', 0)->update(['jurusan_utama' => null]);
        DB::table('pendaftar')->where('jurusan_cadangan', 0)->update(['jurusan_cadangan' => null]);

        // 3. Ubah kolom jadi nullable + rename
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_utama')->nullable()->change();
            $table->unsignedBigInteger('jurusan_cadangan')->nullable()->change();
            
            $table->renameColumn('jurusan_utama', 'jurusan_pilihan_1');
            $table->renameColumn('jurusan_cadangan', 'jurusan_pilihan_2');
        });

        // 4. Pasang foreign key baru
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->foreign('jurusan_pilihan_1')->references('id_jurusan')->on('jurusan')->nullOnDelete();
            $table->foreign('jurusan_pilihan_2')->references('id_jurusan')->on('jurusan')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pendaftar', function (Blueprint $table) {
            $table->dropForeign(['jurusan_pilihan_1']);
            $table->dropForeign(['jurusan_pilihan_2']);
            $table->renameColumn('jurusan_pilihan_1', 'jurusan_utama');
            $table->renameColumn('jurusan_pilihan_2', 'jurusan_cadangan');
            $table->unsignedBigInteger('jurusan_utama')->nullable(false)->change();
            $table->unsignedBigInteger('jurusan_cadangan')->nullable(false)->change();
            $table->foreign('jurusan_utama')->references('id_jurusan')->on('jurusan');
            $table->foreign('jurusan_cadangan')->references('id_jurusan')->on('jurusan');
        });
    }
};