<?php

namespace App\Http\Controllers;

use App\Models\Akun; // 
use Illuminate\Http\Request; 

class AkunController extends Controller
{
    public function edit($id)
{
    $akun = Akun::findOrFail($id); // Mengambil data berdasarkan id
    return view('edit-posts', compact('akun')); // Mengarahkan ke view edit-posts dengan data
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'tanggal' => 'required',
        'waktu' => 'required',
        'jenis_tari' => 'required',
        'pelatih' => 'required',
        'anggota' => 'required',
    ]);

    // Mengambil data jadwal yang ingin diupdate
    $akun = Akun::findOrFail($id);
    
    // Mengupdate data dengan input baru
    $akun->tanggal = $request->input('tanggal');
    $akun->waktu = $request->input('waktu');
    $akun->jenis_tari = $request->input('jenis_tari');
    $akun->pelatih = $request->input('pelatih');
    $akun->anggota = $request->input('anggota');
    
    // Menyimpan perubahan
    $akun->save();

    // Redirect ke halaman awal setelah berhasil update
    return redirect('/')->with('success', 'Jadwal berhasil diupdate!');
}

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
        return view('edit-posts', ['akun' => $akun]); // Pastikan path ini benar
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
