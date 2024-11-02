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
            $table->id('id_penyewaan');
            $table->string('nama_penyewa');
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->string('jenis_baju');
            $table->date('tanggal_peminjaman');
            $table->string('kategori');
            $table->timestamps();
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
