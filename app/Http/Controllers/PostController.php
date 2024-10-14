<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function deletePost(Post $post) {
        // Hapus post
        $post->delete();
        return redirect('/project');
    }

    public function actuallyUpdatePost(Post $post, Request $request) {
        $incomingField = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'kategori' => 'required|in:dewasa,anak-anak',
            'biaya_administrasi' => 'required|in:25000'
        ]);

        $post->update($incomingField);
        return redirect('/project');
    }

    public function showEditScreen(Post $post) {
        return view('edit-post', ['post' => $post]);
    }

    public function createPost(Request $request) {
        // Validasi input dari request
        $incomingField = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'kategori' => 'required|in:dewasa,anak-anak',
            'biaya_administrasi' => 'required|in:25000'
        ]);

        // Simpan data
        $post = Post::create($incomingField);

        // Cek jika request adalah AJAX
        if ($request->ajax()) {
            return response()->json($post); // Mengembalikan data post sebagai JSON
        }

        return redirect('/posts');
    }

    public function index() {
        // Mengambil semua post
        $posts = Post::all();
        return view('project', compact('posts'));
    }
}
