<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{

    use HasFactory;
    protected $fillable = [
        'tanggal',
        'waktu',
        'jenis tari',
        'pelatih',
        'anggota'
    ];
}
