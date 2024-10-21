<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('Id_Transaksi'); // Foreign key untuk tabel penyewaans
            $table->date('tanggal_transaksi'); // Kolom untuk tanggal transaksi
            $table->decimal('total_harga', 10, 2); // Kolom untuk total harga
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraint
            $table->foreign('Id_Transaksi')->references('id')->on('transaksis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}

