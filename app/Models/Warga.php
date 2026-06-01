<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'alamat',
        'status_pkh'
    ];
}
//ini merupakan jembatan(alat komunikasi) yang digunakan untuk membaca sebuah tabel dalam mysql tepatnya di bagian tabel warga
