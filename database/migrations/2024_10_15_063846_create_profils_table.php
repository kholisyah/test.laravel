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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_sanggar');  // Kolom untuk nama sanggar
            $table->string('alamat');  // Kolom untuk alamat
            $table->text('latar_belakang');  // Kolom untuk latar belakang
            $table->text('kegiatan');  // Kolom untuk kegiatan
            $table->text('prestasi');  // Kolom untuk prestasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
