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
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('username')->unique(); // Tambahkan ini jika ingin login pakai username
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable(); // kode ini berfungsi untuk verifikasi email agar email yang kita masukkan terbuksi asli.
        // dan kita sebagai developer bisa menambahkan logika agar ketika emailnya palsu maka orang tersebut tidak bisa login ke web kita
        $table->string('password');
        $table->string('role')->default('user') ('admin');
        $table->rememberToken();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
