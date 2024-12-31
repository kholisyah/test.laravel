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
            $table->string('nama_tari'); 
            $table->foreignId('pelatih_id')->constrained('pelatihs')->onDelete('cascade'); // Menambahkan kolom 'tarian_id' sebagai foreign key
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
