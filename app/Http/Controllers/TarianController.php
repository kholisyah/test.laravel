<?php

namespace App\Http\Controllers;

use App\Models\Tarian;
use Illuminate\Http\Request;

class TarianController extends Controller
{
    // Menampilkan data tarian
    public function index()
    {
        $tarians = Tarian::all(); // Ambil semua data dari database
        return view('tari', compact('tarians')); // Kirim data ke view
    }

    // Menyimpan data tarian baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_tari' => 'required|string|max:255',
            'pelatih' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Tarian::create([
            'nama_tari' => $request->jenis_tari, // Pastikan nama field sesuai
            'pelatih' => $request->pelatih,
            'kategori' => $request->kategori,
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('tarian.index')->with('success', 'Data Tarian berhasil ditambahkan.');
    }
}
