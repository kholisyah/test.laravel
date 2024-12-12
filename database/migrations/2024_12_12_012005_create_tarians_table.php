<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tarians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tari'); // Membuat kolom 'jenis_tari' bertipe string untuk menyimpan jenis tari
            $table->string('pelatih'); // Membuat kolom 'pelatih' bertipe string untuk menyimpan nama pelatih
            $table->string('kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarians');
    }
};
