<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi: Menambahkan kolom telepon
     */
    public function up(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            // Tambahkan kolom baru di sini
            $table->string('telepon')->nullable()->after('alamat');
        });
    }

    /**
     * Membatalkan migrasi: Menghapus kolom telepon jika ada error
     */
    public function down(): void
    {
        Schema::table('wargas', function (Blueprint $table) {
            $table->dropColumn('telepon');
        });
    }
};