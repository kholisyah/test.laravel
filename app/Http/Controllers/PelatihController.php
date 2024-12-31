<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use Illuminate\Http\Request;

class PelatihController extends Controller
{
    // Menampilkan data tarian
    public function index()
    {
        $pelatihs = Pelatih::all();
        return view('pelatih', compact('pelatihs'));
    }

    // Menyimpan data tarian baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Pelatih::create([
            'nama' => $request->nama, // Pastikan nama field sesuai
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ]);

        // Redirect ke halaman utama dengan pesan sukses
        return redirect()->route('pelatih')->with('success', 'Data pelatih berhasil ditambahkan.');
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'no_hp' => 'required|string|max:255',
    ]);

    $pelatih = Pelatih::findOrFail($id);
    $pelatih->update([
        'nama' => $request->nama, // Pastikan nama field sesuai
        'email' => $request->email,
        'no_hp' => $request->no_hp,
    ]);

    return redirect()->route('pelatih')->with('success', 'Data Tarian berhasil diperbarui.');
}

public function destroy($id)
{
    $pelatih = Pelatih::findOrFail($id);
    $pelatih->delete();

    return redirect()->route('pelatih')->with('success', 'Data Tarian berhasil dihapus.');
}

}
