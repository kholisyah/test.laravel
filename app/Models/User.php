<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'user'; // Pastikan tabel sesuai dengan migrasi
    protected $fillable = ['nama', 'password', 'email'];
}
