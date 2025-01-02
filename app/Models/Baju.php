<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    // Tentukan nama tabel jika berbeda dari nama default
    protected $table = 'bajus'; 

    // Tentukan kolom yang dapat diisi
    protected $fillable = ['nama_baju', 'harga', 'jumlah_aksesoris', 'jumlah_sewa', 'foto'];
}