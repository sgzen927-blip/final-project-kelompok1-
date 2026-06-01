<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('wargas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained(); // Menghubungkan ke tabel users
        $table->string('nama');
        $table->string('nik')->unique();
        $table->text('alamat');
        $table->string('status_pkh');
        $table->timestamps(); // Otomatis membuat kolom created_at dan updated_at
    });
}
};
