<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Tarian;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $tarians = Tarian::all();
        $akuns = Akun::all();
        return view('lihat-jadwal', compact('tarians', 'akuns'));
    }

}
