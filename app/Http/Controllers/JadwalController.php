<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Tarian;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $tarians = Tarian::all();
        $akuns = Akun::with('pendaftaran')->get();
        // $pendaftarans = Pendaftaran::all();
        // dd($akuns);

        return view('lihat-jadwal', compact('tarians', 'akuns'));
    }

}
