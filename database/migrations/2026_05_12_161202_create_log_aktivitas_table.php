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
    Schema::create('log_aktivitas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained();
        $table->string('aksi');
        $table->timestamps();
    });
}
};
//tabel ini di buat untuk setiap tindakan penting yang di lakukan oleh pengguna dalam web ini.
// tabel ini penting karena berguna untuk keamanan data, agar kita tahu siapa yang melakukan perubahan 