<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Baju;

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
}
