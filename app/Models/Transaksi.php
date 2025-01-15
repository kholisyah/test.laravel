<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Nama tabel di database
    protected $fillable = ['total', 'tanggal', 'status']; // Sesuaikan dengan kolom tabel

    // Relasi many-to-many dengan Baju
    public function items()
    {
        return $this->belongsToMany(Baju::class, 'transaksi_baju', 'transaksi_id', 'baju_id')
                    ->withPivot('jumlah') // Tambahan kolom pivot seperti 'jumlah'
                    ->withTimestamps();   // Timestamps di tabel pivot jika ada
    }
}
