<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // Menampilkan daftar profil
    public function index() {
        $profils = Profil::all(); 
        return view('dasbord', compact('profils')); // Menggunakan 'dasbord' sebagai nama view
    }

    // Menampilkan form untuk membuat profil baru
    public function create()
    {
        return view('profil.create'); // Pastikan file ini ada di resources/views/profil/create.blade.php
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
    public function showEditScreen(Profil $profil) {
        return view('edit-profil', ['profil' => $profil]); // Pastikan view ini ada di resources/views/edit-profil.blade.php
    }

    // Update profil yang ada
    public function actuallyUpdateProfil(Profil $profil, Request $request) {
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
    public function deleteProfil(Profil $profil) {
        $profil->delete();
        return redirect()->route('profil.index');
    }
}
