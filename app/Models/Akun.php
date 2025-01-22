<?php

namespace App\Models;

use App\Models\Tarian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Akun extends Model
{
    use HasFactory;

    // Tentukan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'tanggal',
        'waktu',
        'tarian_id',  // Gantilah 'jenis_tari' dengan 'tarian_id'
        'pelatih',
        'pendaftaran_id',
    ];

    // Relasi dengan model Tarian (Akun belongsTo Tarian)
// Model Akun (app/Models/Akun.php)
public function tarian()
{
    return $this->belongsTo(Tarian::class, 'tarian_id');
}
public function  pendaftaran()
{
    return $this->belongsTo(Pendaftaran::class, 'pebdaftaran_id');
}

}
