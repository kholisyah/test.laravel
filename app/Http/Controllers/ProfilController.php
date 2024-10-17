<?php

namespace App\Http\Controllers;

use App\Models\Profil; // Ganti Dasbord menjadi Profil
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // Menampilkan daftar profil
    public function index() {
        $profils = Profil::all(); 
        return view('profil', compact('profils'));
    }
    public function create()
    {
        return view('profil.create');
    }

    // Membuat profil baru
    public function createProfil(Request $request) {
        $incomingField = $request->validate([
            'nama_sanggar' => 'required',
            'alamat' => 'required',
            'latar_belakang' => 'required',
            'kegiatan' => 'required',
            'prestasi' => 'required'
        ]);

        $profil = Profil::create($incomingField);
        
        // Mengembalikan response JSON
        return response()->json($profil);
    }

    // Menampilkan halaman edit profil
    public function showEditScreen(Profil $profil) { // Ganti Dasbord menjadi Profil
        return view('edit-profil', ['profil' => $profil]);
    }

    // Update profil yang ada
    public function actuallyUpdateProfil(Profil $profil, Request $request) { // Ganti Dasbord menjadi Profil
        $incomingField = $request->validate([
            'nama_sanggar' => 'required',
            'alamat' => 'required',
            'latar_belakang' => 'required',
            'kegiatan' => 'required',
            'prestasi' => 'required'
        ]);

        $profil->update($incomingField);
        return redirect()->route('profil.index');
    }

    // Menghapus profil
    public function deleteProfil(Profil $profil) { // Ganti Dasbord menjadi Profil
        $profil->delete();
        return redirect()->route('profil.index');
    }
}
