<?php

namespace App\Models;

use App\Models\Akun;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    //Menggunakan trait HasFactory membuat pembuatan data untuk pengisian awal database menjadi lebih mudah dan otomatis
    use HasFactory; 
    protected $fillable =  [
        'nama',
        'email',
        'alamat',
        'no_telepon',
        'kategori',
    ];
    public function akuns()
    {
        return $this->hasMany(Akun::class, 'pendaftaran_id');
    }
}
