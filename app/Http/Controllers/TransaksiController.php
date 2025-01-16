<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
{
    $transaksis = Transaksi::all(); // Mengambil semua data transaksi
    return view('transaksi', compact('transaksis'));
}
    public function show($id)
    {
        // Ambil transaksi berdasarkan ID
        $transaksi = Transaksi::with('items')->findOrFail($id);

        // Tampilkan halaman dengan data transaksi
        return view('transaksi', compact('transaksi'));
    }
}
