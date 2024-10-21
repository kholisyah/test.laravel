<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan semua data transaksi
    public function index() {
        $transaksis = Transaksi::all(); // Mengambil semua data dari tabel `transaksis`
        return view('transaksi', compact('transaksis')); 
        // Mengembalikan view bernama 'transaksi' dan mengirimkan data transaksi ke dalam view tersebut.
    }
    
    // Menampilkan form create untuk menambahkan transaksi baru
    public function create()
    {
        return view('transaksi'); // Mengembalikan view yang digunakan untuk menampilkan form penambahan transaksi baru
    }

    // Menyimpan data transaksi baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form transaksi
        $validated = $request->validate([
            'tanggal_transaksi' => 'required|date', // Tanggal transaksi harus diisi dan dalam format tanggal
            'total_transaksi' => 'required|numeric', // Total transaksi harus diisi dan berupa angka
            'status' => 'required|string', // Status transaksi harus diisi dan berupa string
        ]);

        // Menyimpan data yang sudah divalidasi ke dalam database
        Transaksi::create($validated);
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan.');
        // Setelah penyimpanan berhasil, kembali ke halaman index dengan pesan sukses
    }

    // Menampilkan form edit untuk transaksi yang ada
    public function edit($id)
    {
        // Mencari transaksi berdasarkan ID
        $transaksi = Transaksi::find($id);
        
        // Jika transaksi tidak ditemukan, redirect dengan pesan error
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Data transaksi tidak ditemukan.');
        }

        // Jika transaksi ditemukan, tampilkan form edit dengan data transaksi
        return view('edit_transaksi', compact('transaksi'));
    }

    // Memperbarui transaksi yang ada di database
    public function update(Request $request, $id)
    {
        // Mencari transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id); 
        // Menjalankan validasi input
        $validated = $request->validate([
            'tanggal_transaksi' => 'required|date', // Validasi format tanggal
            'total_transaksi' => 'required|numeric', // Validasi nilai numerik untuk total transaksi
            'status' => 'required|string', // Validasi format status
        ]);

        // Memperbarui data transaksi dengan data yang divalidasi
        $transaksi->update($validated);
        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil diupdate');
        // Redirect ke halaman index dengan pesan sukses setelah data diperbarui
    }

    // Menghapus transaksi berdasarkan ID
    public function destroy($id)
    {
        // Mencari transaksi berdasarkan ID
        $transaksi = Transaksi::findOrFail($id);
        // Menghapus data transaksi
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
        // Redirect ke halaman index dengan pesan sukses setelah penghapusan
    }

    // Menampilkan detail transaksi berdasarkan ID
    public function show($id)
    {
        // Mencari transaksi berdasarkan ID
        $transaksi = Transaksi::find($id);

        // Jika transaksi tidak ditemukan, redirect dengan pesan error
        if (!$transaksi) {
            return redirect()->route('transaksi.index')->with('error', 'Data transaksi tidak ditemukan');
        }

        // Jika transaksi ditemukan, tampilkan detail transaksi
        return view('transaksi.show', compact('transaksi'));
    }
}

