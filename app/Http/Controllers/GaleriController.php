<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all(); // Mendapatkan semua data galeri
        return view('galeri', compact('galeris')); // Mengirim data ke view galeri
    }
}
