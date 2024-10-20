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
            $table->date('tanggal'); // Membuat kolom 'tanggal' bertipe DATE untuk menyimpan tanggal
            $table->time('waktu'); // Membuat kolom 'waktu' bertipe TIME untuk menyimpan waktu
            $table->string('jenis_tari'); // Membuat kolom 'jenis_tari' bertipe string untuk menyimpan jenis tari
            $table->string('pelatih'); // Membuat kolom 'pelatih' bertipe string untuk menyimpan nama pelatih
            $table->string('anggota'); // 'after' menunjukkan posisi kolom
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
