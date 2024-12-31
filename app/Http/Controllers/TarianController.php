<?php

namespace App\Http\Controllers;

use App\Models\Tarian;
use App\Models\Pelatih;
use Illuminate\Http\Request;

class TarianController extends Controller
{
    // Menampilkan data tarian
    public function index()
    {
        $tarians = Tarian::all(); // Ambil semua data dari database
        $pelatihs = Pelatih::all(); // Ambil semua data pelatih
        return view('tari', compact('pelatihs', 'tarians')); // Kirim data ke view
    }

    // Menyimpan data tarian baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_tari' => 'required|string|max:255',  // Pastikan nama_tari
            'pelatih_id' => 'required|exists:pelatihs,id',  // Validasi ID pelatih
            'kategori' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Tarian::create([
            'nama_tari' => $request->nama_tari, // Sesuaikan dengan input dari form
            'pelatih_id' => $request->pelatih_id,
            'kategori' => $request->kategori,
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('tarian.index')->with('success', 'Data Tarian berhasil ditambahkan.');
    }

    // Mengupdate data tarian
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_tari' => 'required|string|max:255',
            'pelatih_id' => 'required|exists:pelatihs,id',
            'kategori' => 'required|string|max:255',
        ]);

        // Cari data tarian berdasarkan ID
        $tarian = Tarian::findOrFail($id);

        // Update data tarian
        $tarian->update([
            'nama_tari' => $request->nama_tari,  // Sesuaikan dengan input dari form
            'pelatih_id' => $request->pelatih_id,
            'kategori' => $request->kategori,
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('tarian.index')->with('success', 'Data Tarian berhasil diperbarui.');
    }

    // Menghapus data tarian
    public function destroy($id)
    {
        // Cari data tarian berdasarkan ID
        $tarian = Tarian::findOrFail($id);

        // Hapus data tarian
        $tarian->delete();

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('tarian.index')->with('success', 'Data Tarian berhasil dihapus.');
    }
}
