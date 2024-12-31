<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarian extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tari',
        'pelatih_id',
        'kategori',
    ];

    public function pelatih()
{
    return $this->belongsTo(Pelatih::class, 'pelatih_id');
}

}
