<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baju extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'harga_sewa', 'stok', 'kategori', 'foto']; // Tambahkan atribut sesuai kebutuhan

    // Relasi many-to-many dengan Transaksi
    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class, 'transaksi_baju', 'baju_id', 'transaksi_id')
                    ->withPivot('jumlah') // Tambahan kolom pivot seperti 'jumlah'
                    ->withTimestamps();   // Timestamps di tabel pivot jika ada
    }
}
