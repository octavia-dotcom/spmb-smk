<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('dokumen_pendaftar', function (Blueprint $table) {
        $table->string('pas_foto_3x4')->nullable()->after('skl'); 
        $table->string('pas_foto_4x6')->nullable()->after('pas_foto_3x4');
    });
}

public function down()
{
    Schema::table('dokumen_pendaftar', function (Blueprint $table) {
        $table->dropColumn(['pas_foto_3x4', 'pas_foto_4x6']);
    });
}
};
