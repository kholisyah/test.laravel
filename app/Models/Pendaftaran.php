<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    //Menggunakan trait HasFactory membuat pembuatan data untuk pengisian awal database menjadi lebih mudah dan otomatis
    use HasFactory; 
    protected $fillable = [
        'nama',
        'email',
        'alamat',
        'no_telepon',
        'kategori',
    ];
}
