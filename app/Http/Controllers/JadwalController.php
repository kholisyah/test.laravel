<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
{
    $jadwals = Akun::all(); // Mengambil data dari model Akun
    return view('lihat-jadwal', compact('jadwals'));
}

}
