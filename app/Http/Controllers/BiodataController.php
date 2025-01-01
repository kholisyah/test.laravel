<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class BiodataController extends Controller
{
    public function create()
    {
        return view('biodata');
    }

   // App\Http\Controllers\BiodataController.php

   public function storeBiodata(Request $request)
   {
       // Validasi data biodata
       $validated = $request->validate([
           'nama_penyewa' => 'required|string|max:255',
           // Validasi lainnya jika diperlukan
       ]);

       // Simpan data biodata ke session
       session()->put('biodata', [
           'nama_penyewa' => $validated['nama_penyewa'],
           // Simpan data lainnya jika ada
       ]);

       // Arahkan ke halaman cart
       return redirect()->route('cart.index');
   }


}
