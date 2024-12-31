<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodatas'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'email',
    ];
}
