<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Fungsi untuk menghapus post berdasarkan instance model Post
    public function deletePost(Post $post) {
        $post->delete();
        return redirect('/project');
    }

    // Fungsi untuk memperbarui data post
    public function actuallyUpdatePost(Post $post, Request $request) {
        try {
            $incomingField = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'no_telepon' => 'required',
                'kategori' => 'required|in:dewasa,anak-anak',
                'biaya_administrasi' => 'required|numeric|min:25000'
            ]);

            $post->update($incomingField);
            return redirect('/project');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        }
    }

    // Fungsi untuk menampilkan halaman edit post
    public function showEditScreen(Post $post) {
        return view('edit-post', ['post' => $post]);
    }

    // Fungsi untuk membuat post baru
    public function createPost(Request $request) {
        try {
            $incomingField = $request->validate([
                'nama' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'no_telepon' => 'required',
                'kategori' => 'required|in:dewasa,anak-anak',
                'biaya_administrasi' => 'required|numeric|min:25000'
            ]);

            $post = Post::create($incomingField);

            if ($request->ajax()) {
                return response()->json($post);
            }

            return redirect('/posts');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        }
    }

    // Fungsi untuk menampilkan semua post
    public function index() {
        $posts = Post::all();
        return view('project', compact('posts'));
    }
}