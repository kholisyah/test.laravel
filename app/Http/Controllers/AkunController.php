<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    public function deletePost(Akun $akun) {
        $akun->delete();
        return redirect('/jadwal');
    }
    
    public function actuallyUpdatePost(Akun $akun, Request $request) {
        $incomingField = $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required',
            'jenis_tari' => 'required',
            'pelatih' => 'required',
            'anggota' => 'required' // Validasi anggota
        ]);
    
        $akun->update($incomingField);
        return redirect('/jadwal');
    }
    

    public function showEditScreen(Akun $akun) {
        // Tampilkan halaman edit dengan data akun
        return view('edit-posts', ['akun' => $akun]); // Perbaikan huruf kecil
    }
    
    public function index() {
        // Ambil semua data akun
        $akuns = Akun::all();
    
        // Kirim data ke view
        return view('jadwal', ['akuns' => $akuns]);
    }
     
    
    public function createPost(Request $request) {
        // Validasi input termasuk waktu, jenis tari, dan pelatih
        $request->validate([
            'tanggal' => 'required|string',
            'waktu' => 'required|string',
            'jenis_tari' => 'required|string',
            'pelatih' => 'required|string',
            'anggota' => 'required|string' // Validasi anggota
        ]);

        // Buat post baru
        $post = new Akun();
        $post->tanggal = $request->input('tanggal');
        $post->waktu = $request->input('waktu');
        $post->jenis_tari = $request->input('jenis_tari');
        $post->pelatih = $request->input('pelatih');
        $post->anggota = $request->input('anggota'); // Menyimpan anggota
        $post->save(); // Simpan data ke database

        // Redirect ke halaman jadwal
        return redirect('/jadwal');
    }
}
