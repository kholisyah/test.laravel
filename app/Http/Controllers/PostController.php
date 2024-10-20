<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Fungsi untuk menghapus post berdasarkan instance model Post
    public function deletePost(Post $post) {
        // Hapus post dari database
        $post->delete();
        // Redirect ke halaman /project setelah post dihapus
        return redirect('/project');
    }
    // Fungsi untuk memperbarui data post
    public function actuallyUpdatePost(Post $post, Request $request) {
        // Validasi input dari request
        $incomingField = $request->validate([
            'nama' => 'required', // Nama wajib diisi
            'email' => 'required|email', // Email wajib diisi dan harus format email
            'alamat' => 'required', // Alamat wajib diisi
            'no_telepon' => 'required', // Nomor telepon wajib diisi
            'kategori' => 'required|in:dewasa,anak-anak', // Kategori hanya bisa diisi 'dewasa' atau 'anak-anak'
            'biaya_administrasi' => 'required|in:25000' // Biaya administrasi harus diisi dengan nilai 25000
        ]);
        // Update data post dengan data yang tervalidasi
        $post->update($incomingField);
        // Redirect ke halaman /project setelah post diperbarui
        return redirect('/project');
    }
    // Fungsi untuk menampilkan halaman edit post
    public function showEditScreen(Post $post) {
    // Menampilkan view edit-post dengan data post yang akan di-edit
        return view('edit-post', ['post' => $post]);
    }
    // Fungsi untuk membuat post baru
    public function createPost(Request $request) {
        // Validasi input dari request
        $incomingField = $request->validate([
            'nama' => 'required', // Nama wajib diisi
            'email' => 'required|email', // Email wajib diisi dan harus format email
            'alamat' => 'required', // Alamat wajib diisi
            'no_telepon' => 'required', // Nomor telepon wajib diisi
            'kategori' => 'required|in:dewasa,anak-anak', // Kategori hanya bisa diisi 'dewasa' atau 'anak-anak'
            'biaya_administrasi' => 'required|in:25000' // Biaya administrasi harus diisi dengan nilai 25000
        ]);

        // Simpan data post baru ke dalam database
        $post = Post::create($incomingField);

        // Jika request adalah AJAX, kembalikan data post dalam bentuk JSON
        if ($request->ajax()) {
            return response()->json($post); // Mengembalikan data post sebagai respons JSON
        }
        // Redirect ke halaman /posts jika request bukan AJAX
        return redirect('/posts');
    }
    // Fungsi untuk menampilkan semua post
    public function index() {
        // Mengambil semua data post dari database
        $posts = Post::all();
        // Menampilkan view project dengan semua data post
        return view('project', compact('posts'));
    }
}
