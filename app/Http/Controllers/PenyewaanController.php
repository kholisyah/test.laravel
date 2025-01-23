<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use App\Models\checkout;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index()
    {
        $bajus = Baju::all();
        return view('penyewaan', compact('bajus'));
    }

    public function sewa(Request $request, $id)
    {
        $baju = Baju::findOrFail($id);

        if ($baju->stok < 1) {
            return redirect()->back()->with('error', 'Stok habis!');
        }

        $baju->decrement('stok');
        return redirect()->back()->with('success', 'Baju berhasil disewa!');
    }

    public function lihatPenyewaan(){
        $penyewaans = checkout::all();
        
        return view('lihat-penyewaan', compact('penyewaans'));
    }
}
