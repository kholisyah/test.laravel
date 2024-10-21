<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table = 'admins'; // Pastikan tabel sudah benar

    protected $primaryKey = 'Id_Admin'; // Primary key yang benar

    protected $fillable = ['nama', 'email', 'password']; // Kolom yang bisa diisi
}
