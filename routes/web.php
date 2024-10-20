<?php

use App\Http\Controllers\AkunController;
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
