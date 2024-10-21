<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    // Menampilkan semua data penyewaan
    public function index()
    {
        $penyewaans = Penyewaan::all(); // Mengambil semua data penyewaan
        return view('penyewaan', compact('penyewaans')); // Menampilkan view penyewaan
    }

    // Menampilkan form untuk menambah penyewaan baru
    public function create()
    {
        return view('penyewaan'); // Menampilkan form penyewaan
    }

    // Menyimpan data penyewaan baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_penyewa' => 'required|string|max:255',
            'durasi_sewa' => 'required|integer',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after_or_equal:tanggal_peminjaman',
            'biaya' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Menyimpan data
        Penyewaan::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil ditambahkan.');
    }

    // Menampilkan halaman edit penyewaan
    public function edit($id)
    {
        // Temukan penyewaan berdasarkan id
        $penyewaan = Penyewaan::findOrFail($id);

        // Menampilkan view edit_penyewaan
        return view('edit_penyewaan', compact('penyewaan'));
    }

    // Mengupdate data penyewaan yang sudah ada
    public function update(Request $request, $id)
    {
        $penyewaan = Penyewaan::findOrFail($id);

        // Validasi dan update data penyewaan
        $penyewaan->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penyewaan.index')->with('success', 'Data penyewaan berhasil diupdate.');
    }

    // Menghapus data penyewaan
    public function destroy($id)
    {
        // Temukan penyewaan berdasarkan id dan hapus
        $penyewaan = Penyewaan::findOrFail($id);
        $penyewaan->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('penyewaan.index')->with('success', 'Penyewaan berhasil dihapus.');
    }

    // Menampilkan detail penyewaan
    public function show($id)
    {
        // Temukan penyewaan berdasarkan id
        $penyewaan = Penyewaan::find($id);

        // Jika penyewaan tidak ditemukan, kembali ke index dengan pesan error
        if (!$penyewaan) {
            return redirect()->route('penyewaan.index')->with('error', 'Data penyewaan tidak ditemukan');
        }

        // Tampilkan view show dengan data penyewaan
        return view('penyewaan.show', compact('penyewaan'));
    }
}

