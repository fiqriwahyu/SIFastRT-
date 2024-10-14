<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->text('catatan')->nullable(); // Menambahkan kolom catatan
        });
    }

    public function down()
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->dropColumn('catatan'); // Menghapus kolom catatan saat rollback
        });
    }
};
