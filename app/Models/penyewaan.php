<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penyewaan extends Model
{
    // Menetapkan nama tabel yang digunakan model ini.
    protected $table = 'penyewaans'; // Tabel ini dinamakan 'penyewaans', berbeda dari default Laravel yang menambahkan 's' di belakang nama model.

    // Menetapkan primary key dari tabel 'penyewaans'.
    protected $primaryKey = 'id_penyewaan'; // Kolom yang dijadikan primary key adalah 'id_penyewaan', bukan 'id' yang merupakan default.

    // Menetapkan kolom-kolom yang bisa diisi melalui mass assignment (pengisian data secara massal).
    protected $fillable = ['nama_penyewa', 'alamat', 'no_hp', 'tanggal_peminjaman', 'jenis_baju', 'kategori', 'durasi_sewa', 'biaya'];

}
