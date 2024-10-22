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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); //dalam migrasi database di Laravel adalah untuk secara otomatis
            $table->string('nama');  // Menambahkan kolom nama
            $table->string('email'); // Menambahkan kolom email
            $table->string('alamat'); // Menambahkan kolom alamat
            $table->string('no_telepon'); // Menambahkan kolom no telepon
            $table->enum('kategori', ['dewasa', 'anak-anak']); // Menambahkan kolom kategori
            $table->integer('biaya_administrasi')->default(25000); // Menambahkan kolom biaya administrasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
