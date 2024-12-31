<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user'; // Gunakan tabel 'pengguna'

    protected $fillable = [
        'nama',
        'password',
        'role',
    ];

    protected $hidden = [
        'password', // Sembunyikan password saat serialisasi
        'remember_token',
    ];
}