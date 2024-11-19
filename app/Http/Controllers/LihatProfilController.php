<?php

namespace App\Http\Controllers;

use App\Models\LihatProfil;
use App\Models\LihatSanggar;
use Illuminate\Http\Request;

class LihatProfilController extends Controller
{
    public function show()
    {
        // Ambil data profil dari model
        $profil = LihatProfil::first(); // Menampilkan satu data pertama

        // Jika tidak ada data, redirect ke dashboard
        if (!$profil) {
            return redirect('/lihat-profil')->with('error', 'Profil Sanggar tidak ditemukan!');
        }

        // Kembalikan tampilan profil dan kirim data ke view
        return view('lihat-profil', compact('profil'));
    }
}
