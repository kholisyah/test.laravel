<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggans'; // Pastikan nama tabel sesuai
    protected $primaryKey = 'id_pelanggan'; // Sesuaikan dengan primary key
    protected $fillable = ['nama', 'nomor_telpon', 'alamat', 'email']; // Kolom yang dapat diisi

    
}
