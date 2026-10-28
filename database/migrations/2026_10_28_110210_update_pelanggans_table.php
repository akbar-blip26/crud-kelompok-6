<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->string('kategori')->nullable();
            $table->date('tanggal_daftar')->nullable();
            $table->text('keterangan')->nullable();

            $table->dropColumn('no_telepon');
        });
    }

    public function down(): void
    {
        Schema::table('pelanggans', function (Blueprint $table) {
            $table->string('no_telepon', 20)->nullable();

            $table->dropColumn([
                'kategori',
                'tanggal_daftar',
                'keterangan',
            ]);
        });
    }
};