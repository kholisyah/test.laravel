<?php

namespace App\Http\Controllers;

use App\Models\Akun; // Mengimpor model Akun untuk berinteraksi dengan tabel 'akun'
use Illuminate\Http\Request; // Mengimpor Request untuk menangani input dari user

class AkunController extends Controller
{
    // Method untuk menghapus akun tertentu
    public function deletePost(Akun $akun) {
        $akun->delete(); // Menghapus data akun dari database
        return redirect('/jadwal'); // Mengarahkan pengguna kembali ke halaman jadwal
    }
    
    // Method untuk memperbarui data akun tertentu
    public function actuallyUpdatePost(Akun $akun, Request $request) {
        // Validasi input dari user sebelum memperbarui
        $incomingField = $request->validate([
            'tanggal' => 'required', // Tanggal wajib diisi
            'waktu' => 'required', // Waktu wajib diisi
            'jenis_tari' => 'required', // Jenis tari wajib diisi
            'pelatih' => 'required', // Pelatih wajib diisi
            'anggota' => 'required' // Anggota wajib diisi
        ]);
    
        // Memperbarui data akun di database dengan data yang divalidasi
        $akun->update($incomingField);
        return redirect('/jadwal'); // Mengarahkan kembali ke halaman jadwal
    }
    
    // Method untuk menampilkan halaman edit
    public function showEditScreen(Akun $akun) {
        // Mengirim data akun ke view 'edit-posts' untuk ditampilkan pada form edit
        return view('edit-posts', ['akun' => $akun]); // Menampilkan halaman edit dengan data akun
    }
    
    // Method untuk mengambil dan menampilkan semua data akun
    public function index() {
        $akuns = Akun::all(); // Mengambil semua data dari tabel 'akun'
        return view('jadwal', ['akuns' => $akuns]); // Mengirim data ke view 'jadwal'
    }
     
    // Method untuk membuat data akun baru
    public function createPost(Request $request) {
        // Validasi input dari user sebelum menyimpan
        $request->validate([
            'tanggal' => 'required|string', // Tanggal wajib diisi dan harus berupa string
            'waktu' => 'required|string', // Waktu wajib diisi dan harus berupa string
            'jenis_tari' => 'required|string', // Jenis tari wajib diisi dan harus berupa string
            'pelatih' => 'required|string', // Pelatih wajib diisi dan harus berupa string
            'anggota' => 'required|string' // Anggota wajib diisi dan harus berupa string
        ]);

        // Membuat objek baru dari model Akun
        $post = new Akun();
        // Mengisi properti dengan data yang diambil dari request
        $post->tanggal = $request->input('tanggal');
        $post->waktu = $request->input('waktu');
        $post->jenis_tari = $request->input('jenis_tari');
        $post->pelatih = $request->input('pelatih');
        $post->anggota = $request->input('anggota'); // Menyimpan data anggota yang dimasukkan
        $post->save(); // Menyimpan data ke dalam database

        // Mengarahkan pengguna kembali ke halaman jadwal
        return redirect('/jadwal');
    }
}
