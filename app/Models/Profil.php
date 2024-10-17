<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model 
{
    use HasFactory;

    protected $table = 'profils';

    // Mass assignable attributes
    protected $fillable = ['nama_sanggar', 'alamat', 'latar_belakang', 'kegiatan', 'prestasi']; 
}
