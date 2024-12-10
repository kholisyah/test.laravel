<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('galeris', function (Blueprint $table) {
        $table->id();
        $table->string('nama'); // Nama baju
        $table->string('deskripsi'); // Deskripsi baju
        $table->string('kategori'); // Baju adat atau baju tarian
        $table->string('gambar'); // Lokasi gambar baju
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
