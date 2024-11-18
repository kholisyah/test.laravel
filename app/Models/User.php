<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user'; // Gunakan tabel 'user' alih-alih 'users'

    protected $fillable = [
        'nama',
        'password',
    ];
}