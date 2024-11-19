<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LihatProfil extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'lihat_profils';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['nama', 'deskripsi', 'visi', 'misi'];
}

