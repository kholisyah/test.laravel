<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/project', [PostController::class, 'index'])->name('posts.index');

// Route untuk create post
Route::post('/create-post', [PostController::class, 'createPost'])->name('create-post');

//edit
Route::get('/edit-post/{post}', [PostController::class, 'showEditScreen']);
Route::put('/edit-post/{post}', [PostController::class, 'actuallyUpdatePost']);

//hapus
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

