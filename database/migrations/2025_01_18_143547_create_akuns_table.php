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
        Schema::create('akuns', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // Kolom 'tanggal' bertipe DATE untuk menyimpan tanggal
            $table->time('waktu'); // Kolom 'waktu' bertipe TIME untuk menyimpan waktu
            $table->foreignId('tarian_id')->constrained('tarians')->onDelete('cascade'); // Menambahkan kolom 'tarian_id' sebagai foreign key
            $table->string('pelatih'); // Kolom 'pelatih' bertipe string untuk menyimpan nama pelatih
            $table->foreignId('pendaftaran_id')->constrained('pendaftarans')->onDelete('cascade');
            //anggota
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuns');
    }
};