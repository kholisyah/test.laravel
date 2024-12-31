<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:500',
            'no_telp' => 'required|numeric',
            'email' => 'required|email',
        ]);

        // Menyimpan biodata ke database
        // Misalnya menggunakan model Galeri untuk menyimpan data
        // Galeri::create($validated);

        // Menampilkan pesan sukses
        return response()->json(['message' => 'Biodata berhasil disimpan!']);
    }
    public function index()
    {
        $galeris = Galeri::all(); // Mendapatkan semua data galeri
        return view('galeri', compact('galeris')); // Mengirim data ke view galeri
    }
}
