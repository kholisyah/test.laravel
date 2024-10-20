<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs'; // Ganti dengan nama tabel Anda
    protected $primaryKey = 'id_barang'; // Sesuaikan dengan nama kolom primary key
  
    
    protected $fillable = ['nama', 'kategori', 'warna', 'harga_sewa', 'jenis', 'stok', 'jumlah_aksesoris']; // Kolom yang dapat diisi
}