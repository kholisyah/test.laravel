<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'email' => 'required|email',
                'alamat' => 'required|string',
                'no_telepon' => 'required|string',
                'kategori' => 'required|string',
                'biaya_administrasi' => 'required|integer',
            ]);
    
            // Simpan data
            $post = Post::create($validatedData);
    
            // Kembalikan data dalam format JSON
            return response()->json($post);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

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
    // Validasi dan simpan data
    $post = new Post();
    $post->nama = $request->nama;
    $post->email = $request->email;
    $post->alamat = $request->alamat;
    $post->no_telepon = $request->no_telepon;
    $post->kategori = $request->kategori;
    $post->biaya_administrasi = $request->biaya_administrasi;
    $post->save();

    return response()->json($post); // Pastikan mengembalikan data yang baru disimpan
}

    // Fungsi untuk menampilkan semua post
    public function index() {
        // Mengambil semua data post dari database
        $posts = Post::all();
        // Menampilkan view project dengan semua data post
        return view('project', compact('posts'));
    }
}
