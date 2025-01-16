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
    Schema::create('akun_pendaftaran', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('akun_id');
        $table->unsignedBigInteger('pendaftaran_id');
        $table->foreign('akun_id')->references('id')->on('akuns')->onDelete('cascade');
        $table->foreign('pendaftaran_id')->references('id')->on('pendaftaran')->onDelete('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun_pendaftaran');
    }
};
