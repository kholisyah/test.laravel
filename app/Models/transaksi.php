<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis'; // Pastikan nama tabel sesuai
    protected $primaryKey = 'Id_Transaksi'; // Sesuaikan dengan primary key
    protected $fillable = ['tanggal_transaksi','total_transaksi','status']; // Kolom yang dapat diisi

}
