<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    use HasFactory;
    protected $table = 'checkout';

    protected $fillable = [
        'id_baju',
        'product_name',
        'quantity',
        'prices',
        'total',
        'status',
    ];
}