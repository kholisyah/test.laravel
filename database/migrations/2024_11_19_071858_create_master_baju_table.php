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
    Schema::create('master_baju', function (Blueprint $table) {
        $table->id();
        $table->string('jenis_baju'); // Jenis Baju
        $table->decimal('harga_sewa', 10, 2); // Harga sewa untuk baju
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('master_baju');
}

};
