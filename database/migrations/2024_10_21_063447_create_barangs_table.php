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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id('id_Barang'); // Menggunakan ID_Barang sebagai primary key
            $table->string('nama'); // Nama barang
            $table->string('kategori'); // Kategori barang
            $table->string('warna'); // Warna barang
            $table->decimal('harga_sewa', 10, 2); // Harga sewa
            $table->string('jenis'); // Jenis barang
            $table->integer('stok'); // Stok barang
            $table->integer('jumlah_aksesoris');
            $table->timestamps(); // Kolom created_at dan updated_at

        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
