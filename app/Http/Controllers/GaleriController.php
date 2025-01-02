<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju; // Model untuk tabel baju
use App\Models\Cart; // Model untuk tabel cart

class GaleriController extends Controller
{
    // Menampilkan halaman galeri
    public function index()
    {
        // Mengambil semua data baju dari database
        $bajus = Baju::all();

        // Return view galeri dengan data baju
        return view('galeri', compact('bajus'));
    }

    // Menambahkan item ke cart
    public function addToCart(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_baju' => 'required|exists:baju,id_baju',
            'jumlah' => 'required|integer|min:1',
            'kategori' => 'required|string'
        ]);

        // Ambil data baju berdasarkan ID
        $baju = Baju::findOrFail($request->id_baju);

        // Hitung total harga
        $total_harga = $baju->harga * $request->jumlah;

        // Simpan data ke cart
        Cart::create([
            'id_baju' => $baju->id_baju,
            'jumlah' => $request->jumlah,
            'kategori' => $request->kategori,
            'total_harga' => $total_harga,
        ]);

        // Redirect kembali ke galeri dengan pesan sukses
        return redirect()->back()->with('success', 'Item berhasil ditambahkan ke cart!');
    }
}
