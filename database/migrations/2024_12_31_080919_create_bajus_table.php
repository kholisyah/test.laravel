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
        Schema::create('bajus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_baju'); 
            $table->integer('harga');
            $table->string('jumlah_aksesoris'); 
            $table->string('jumlah_sewa');  
            $table->string('foto')->nullable(); // Kolom untuk foto
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bajus');
    }
};
