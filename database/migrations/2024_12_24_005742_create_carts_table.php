<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('id_baju');
            $table->string('foto');
            $table->string('product_name');
            $table->integer('quantity');
            $table->integer('prices');
            $table->integer('total');
            $table->string('category'); // Tambahkan kolom kategori
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
