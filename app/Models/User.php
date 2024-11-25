<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;
    use HasFactory;

    protected $table = 'user'; // Pastikan tabel sesuai dengan migrasi
    protected $fillable = ['nama', 'password', 'email'];
}