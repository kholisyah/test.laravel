<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajusTable extends Migration
{
    public function up()
    {
        Schema::create('bajus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kategori'); // baju adat atau baju tarian
            $table->integer('stok')->default(15);
            $table->integer('jumlah_aksesoris');
            $table->integer('harga_sewa');
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bajus');
    }
}