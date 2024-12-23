<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Tarian; // Menambahkan model Tarian
use Illuminate\Http\Request;

class AkunController extends Controller
{
    // Method untuk menampilkan semua data akun
    public function index()
    {
        $tarians = Tarian::all();
        $akuns = Akun::all();
        return view('jadwal', compact('tarians', 'akuns'));
    }

    public function createPost(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|string',
            'waktu' => 'required|string',
            'tarian_id' => 'required|exists:tarians,id',
            'pelatih' => 'required|string',
            'anggota' => 'required|string'
        ]);

        $post = new Akun();
        $post->tanggal = $request->input('tanggal');
        $post->waktu = $request->input('waktu');
        $post->tarian_id = $request->input('tarian_id');
        $post->pelatih = $request->input('pelatih');
        $post->anggota = $request->input('anggota');
        $post->save();

        return redirect()->route('jadwal');
    }
    
    

    // Method untuk menampilkan halaman edit
    public function showEditScreen(Akun $akun)
    {
        $tarians = Tarian::all(); // Mengambil semua data tarian
        return view('edit-posts', ['akun' => $akun, 'tarians' => $tarians]); // Mengirim data ke view edit-posts
    }

    // Method untuk mengupdate data akun tertentu
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'tarian_id' => 'required|exists:tarians,id', // Validasi untuk memastikan tarian_id valid
            'pelatih' => 'required',
            'anggota' => 'required',
        ]);

        // Mengambil data akun yang ingin diupdate
        $akun = Akun::findOrFail($id);

        // Mengupdate data dengan input baru
        $akun->tanggal = $request->input('tanggal');
        $akun->waktu = $request->input('waktu');
        $akun->tarian_id = $request->input('tarian_id'); // Update kolom tarian_id
        $akun->pelatih = $request->input('pelatih');
        $akun->anggota = $request->input('anggota');

        // Menyimpan perubahan
        $akun->save();

        // Redirect ke halaman jadwal setelah berhasil update
        return redirect('/jadwal')->with('success', 'Jadwal berhasil diupdate!');
    }

    // Method untuk membuat data akun baru



    // Method untuk menghapus akun tertentu
    public function deletePost(Akun $akun)
    {
        $akun->delete(); // Menghapus data akun dari database
        return redirect('/jadwal'); // Mengarahkan pengguna kembali ke halaman jadwal
    }
}
