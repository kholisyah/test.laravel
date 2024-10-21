<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migration untuk membuat tabel 'penyewaans'.
     */
    public function up(): void
    {
        // Membuat tabel baru bernama 'penyewaans'
        Schema::create('penyewaans', function (Blueprint $table) {
            $table->id();  // Membuat kolom auto-increment primary key 'id'
            $table->string('nama_penyewa');  // Kolom untuk menyimpan nama penyewa dengan tipe string
            $table->integer('durasi_sewa');  // Kolom untuk menyimpan durasi sewa dalam bentuk integer
            $table->date('tanggal_peminjaman');  // Kolom untuk menyimpan tanggal peminjaman, tipe date
            $table->date('tanggal_pengembalian');  // Kolom untuk menyimpan tanggal pengembalian, tipe date
            $table->decimal('biaya', 10, 2);  // Kolom untuk menyimpan biaya penyewaan, dengan total 10 digit dan 2 angka desimal
            $table->string('status');  // Kolom untuk menyimpan status penyewaan, misalnya 'berlangsung', 'selesai', dll.
            $table->timestamps();  // Menambahkan kolom created_at dan updated_at secara otomatis
        });
    }

    /**
     * Reverse the migrations (membatalkan perubahan yang dilakukan oleh 'up').
     */
    public function down(): void
    {
        // Menghapus tabel 'penyewaans' jika migration ini dibatalkan
        Schema::dropIfExists('penyewaans');
    }
};
