<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Fungsi ini digunakan untuk menjalankan migrasi (membuat tabel pelanggans).
     */
    public function up(): void // Baris 9
    {
        // Membuat tabel 'pelanggans' dengan kolom-kolom yang diperlukan
        Schema::create('pelanggans', function (Blueprint $table) { // Baris 11
            $table->id('id_pelanggan'); // Baris 12, membuat kolom primary key 'id_pelanggan'
            $table->string('nama'); // Baris 13, membuat kolom string 'nama'
            $table->string('nomor_telpon'); // Baris 14, membuat kolom string 'nomor_telpon'
            $table->string('alamat'); // Baris 15, membuat kolom string 'alamat'
            $table->string('email'); // Baris 16, membuat kolom string 'email'
            $table->timestamps(); // Baris 17, membuat kolom otomatis 'created_at' dan 'updated_at'
        });
    }

    /**
     * Fungsi ini digunakan untuk membalikkan migrasi (menghapus tabel pelanggans).
     */
    public function down(): void // Baris 22
    {
        // Menghapus tabel 'pelanggans' jika ada
        Schema::dropIfExists('pelanggans'); // Baris 24
    }
};
