<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/project', function () {
    return view('project');
});
Route::get('/dasbord', function () {
    return view('dasbord');
});
// Rute untuk 'jadwal'
Route::get('/jadwal', [AkunController::class, 'index']);

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

// Barang Routes
Route::resource('barang', BarangController::class);
Route::get('barang/{barang}/edit', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::put('barang/{barang}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('barang/{barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
// Route untuk form edit
Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit']);

// Route untuk proses update
Route::put('/barang/update/{id_barang}', [BarangController::class, 'update']);
// route untuk proses delete
Route::delete('/barang/delete/{id_barang}', [BarangController::class, 'destroy'])->name('barang.destroy');
// Route untuk menampilkan form edit
Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit'])->name('barang.edit');

// Route untuk memproses update barang
Route::put('/barang/update/{id_barang}', [BarangController::class, 'update'])->name('barang.update');
// Rute untuk menampilkan form edit
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');

// Rute untuk memproses update barang
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');

// untuk pelanggan

Route::put('/pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

// Rute untuk menampilkan daftar pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');

// Rute untuk menyimpan pelanggan baru
Route::post('/pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');

// Rute untuk mengedit pelanggan
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::post('/pelanggan/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');

// Rute untuk menghapus pelanggan
Route::delete('/pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::put('/pelanggan/update/{id}', [PelangganController::class, 'update']);

