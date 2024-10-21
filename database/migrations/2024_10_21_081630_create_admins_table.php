<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Method ini akan dijalankan saat kita ingin membuat atau mengubah tabel di database.
     */
    public function up()
    {
        // Membuat tabel 'admins' di database
        Schema::create('admins', function (Blueprint $table) {
            // Menambahkan kolom 'Id_Admin' sebagai primary key dengan tipe data auto-increment (bigint)
            $table->id('Id_Admin');  
            
            // Menambahkan kolom 'nama' untuk menyimpan nama admin dengan tipe data string (varchar)
            $table->string('nama');
            
            // Menambahkan kolom 'email' untuk menyimpan email admin, dan memastikan nilai email unik
            $table->string('email')->unique(); 
            
            // Menambahkan kolom 'password' untuk menyimpan password admin dalam bentuk terenkripsi
            $table->string('password');
            
            // Menambahkan kolom 'created_at' dan 'updated_at' untuk mencatat kapan data dibuat dan diubah
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     * Method ini akan dijalankan saat kita ingin menghapus atau rollback tabel yang telah dibuat.
     */
    public function down(): void
    {
        // Menghapus tabel 'admins' dari database jika migration di-rollback
        Schema::dropIfExists('admins');
    }
};
