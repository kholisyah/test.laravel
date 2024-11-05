<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('dashboard');
});
Route::get('/project', function () {
    return view('project');
});
Route::get('/dasbord', function () {
    return view('dasbord');
});

Route::get('/home', function () {
    return view('home');
});
// Rute untuk 'jadwal'
Route::get('/jadwal', [AkunController::class, 'index']);

//Rout pendaftaran
// Route untuk menampilkan daftar post
Route::get('/project', [PostController::class, 'index'])->name('posts.index');
// Route untuk create post
Route::post('/create-post', [PostController::class, 'createPost'])->name('create-post');
//Route untuk edit post
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);
//Route untuk delete post
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);


// Route untuk menampilkan daftar profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
// Route untuk create profil
Route::get('/create-profil', [ProfilController::class, 'create'])->name('profil.create');
//Route untuk edit profil
Route::get('/edit-profil/{profil}', [ProfilController::class, 'showEditScreen'])->name('profil.edit');
//Route untuk update edit profil
Route::put('/edit-profil/{profil}', [ProfilController::class, 'actuallyUpdateProfil']);
//Route untuk delete profil
Route::delete('/delete-profil/{profil}', [ProfilController::class, 'deleteProfil']);


// Rute untuk halaman jadwal (untuk Akun)
Route::get('/jadwal', [AkunController::class, 'index']);
// Rute untuk menambah akun baru
Route::post('/create-post', [AkunController::class, 'createPost']);
// Rute untuk menampilkan halaman edit (untuk Akun)
Route::get('/edit-posts/{akun}', [AkunController::class, 'showEditScreen']);
Route::put('/edit-posts/{akun}', [AkunController::class, 'actuallyUpdatePost']);
// Rute untuk menghapus akun
Route::delete('/delete-posts/{akun}', [AkunController::class, 'deletePost']);

// Rute untuk halaman edit
Route::get('/edit-posts/{id}', [AkunController::class, 'edit'])->name('edit');

// Rute untuk menyimpan pembaruan data
Route::post('/update-posts/{id}', [AkunController::class, 'update'])->name('update');


// Rute untuk fitur penyewaan

// Menampilkan daftar penyewaan
Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.index');
// Penjelasan: Mengakses URL `/penyewaan` akan memanggil metode `index` di `PenyewaanController`, yang bertugas untuk menampilkan daftar semua penyewaan. Ini biasanya halaman yang berisi tabel penyewaan yang tersedia.

// Menampilkan form untuk membuat penyewaan baru
Route::get('/penyewaan/create', [PenyewaanController::class, 'create'])->name('penyewaan.create');
// Penjelasan: Mengakses URL `/penyewaan/create` akan memanggil metode `create` di `PenyewaanController`, yang menampilkan halaman form untuk menambahkan penyewaan baru. Pengguna dapat memasukkan data penyewaan di form ini.

// Menyimpan penyewaan baru ke dalam database
Route::post('/penyewaan', [PenyewaanController::class, 'store'])->name('penyewaan.store');
// Penjelasan: Rute ini menangani permintaan POST yang dikirim dari form penyewaan baru. Setelah form disubmit, metode `store` pada `PenyewaanController` akan memproses data dan menyimpannya ke database.

// Menampilkan form untuk mengedit penyewaan berdasarkan ID
Route::get('/penyewaan/{id}/edit', [PenyewaanController::class, 'edit'])->name('penyewaan.edit');
// Penjelasan: Rute ini akan memanggil metode `edit` di `PenyewaanController`, yang bertugas menampilkan form untuk mengedit penyewaan yang sudah ada. Data penyewaan yang akan diedit akan dimuat berdasarkan ID yang diberikan di URL (`{id}`).

// Memperbarui data penyewaan di database berdasarkan ID
Route::put('/penyewaan/{id}', [PenyewaanController::class, 'update'])->name('penyewaan.update');
// Penjelasan: Rute ini digunakan untuk memperbarui data penyewaan yang ada. Setelah form edit disubmit, metode `update` di `PenyewaanController` akan menyimpan perubahan ke database. ID penyewaan yang diupdate diambil dari URL (`{id}`).

// Menghapus penyewaan dari database berdasarkan ID
Route::delete('/penyewaan/{id}', [PenyewaanController::class, 'destroy'])->name('penyewaan.destroy');
// Penjelasan: Rute ini digunakan untuk menghapus penyewaan berdasarkan ID. Saat pengguna melakukan aksi hapus, metode `destroy` di `PenyewaanController` akan dijalankan untuk menghapus data penyewaan dari database.

// Menampilkan detail penyewaan berdasarkan ID
Route::get('/penyewaan/{id}', [PenyewaanController::class, 'show'])->name('penyewaan.show');
// Penjelasan: Rute ini digunakan untuk menampilkan detail lengkap penyewaan tertentu. Metode `show` pada `PenyewaanController` akan menampilkan informasi rinci tentang penyewaan yang dipilih berdasarkan ID yang diberikan di URL (`{id}`).


// Rute untuk melihat jadwal latihan
Route::get('/lihat-jadwal', [JadwalController::class, 'index'])->name('lihat-jadwal');

//home
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);