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
        $pelatihs = Pelatih::all();
        return view('tari', compact('pelatihs', 'tarians'));
    }

    // Menyimpan data tarian baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_tari' => 'required|string|max:255',
            'pelatih_id' => 'required|exists:pelatihs,id',
            'kategori' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Tarian::create([
            'nama_tari' => $request->jenis_tari, // Pastikan nama field sesuai
            'pelatih_id' => $request->pelatih_id,
            'kategori' => $request->kategori,
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('tarian.index')->with('success', 'Data Tarian berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'jenis_tari' => 'required|string|max:255',
        'pelatih_id' => 'required|exists:pelatihs,id',
        'kategori' => 'required|string|max:255',
    ]);

    $tarian = Tarian::findOrFail($id);
    $pelatihs = Pelatih::findOrFail($id);
    $tarian->update([
        'nama_tari' => $request->jenis_tari,
        'pelatih_id' => $request->pelatih_id,
        'kategori' => $request->kategori,
    ]);

    return redirect()->route('tarian.index')->with('success', 'Data Tarian berhasil diperbarui.');
}

public function destroy($id)
{
    $tarian = Tarian::findOrFail($id);
    $pelatihs = Pelatih::findOrFail($id);
    $tarian->delete();

    return redirect()->route('tarian.index')->with('success', 'Data Tarian berhasil dihapus.');
}

}
