<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\LihatProfil;
use App\Models\LihatSanggar;
use Illuminate\Http\Request;

class LihatProfilController extends Controller
{
    public function index()
    {
        $jadwals = Profil::all(); // Mengambil data dari model Akun
        return view('lihat-profil', compact('lihat-profil'));
    }
}
