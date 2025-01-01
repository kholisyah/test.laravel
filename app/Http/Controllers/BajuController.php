<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;

class BajuController extends Controller
{
    // Display a listing of bajus
    public function index()
    {
        $bajus = Baju::all();
        return view('baju', compact('bajus'));
    }
    
    // Show the form for creating a new baju
    public function create()
    {
        return view('baju.create');  // Halaman create biasanya tidak butuh $bajus
    }
    

    // Store a newly created baju in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_baju' => 'required|string',
            'harga' => 'required|numeric',
            'jumlah_aksesoris' => 'required|numeric',
            'jumlah_sewa' => 'required|numeric',
        ]);
        // dd($validated);

        $baju = new Baju();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = $file->store('public/baju'); // Simpan foto di folder public/baju
            // dd($path);
            $baju->foto = $path;
        }
        $baju->nama_baju = $request->nama_baju;
        $baju->harga = $request->harga;
        $baju->jumlah_aksesoris = $request->jumlah_aksesoris;
        $baju->jumlah_sewa = $request->jumlah_sewa;
        $baju->save();

        return redirect()->route('baju.index')->with('success', 'Baju berhasil ditambahkan');
    }

    // Show the form for editing the specified baju
    public function edit(Baju $baju)
    {
        return view('baju', compact('baju'));
    }

    // Update the specified baju in storage
    public function update(Request $request, Baju $baju)
    {
        
        
        $request->validate([
            'nama_baju' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_aksesoris' => 'required|string',
            'jumlah_sewa' => 'required|string'
        ]);
        $baju->update($request->all());

        return redirect()->route('baju.index')->with('success', 'Baju updated successfully.');
    }

    // Remove the specified baju from storage
    public function destroy(Baju $baju)
    {
        $baju->delete();

        return redirect()->route('baju.index')->with('success', 'Baju deleted successfully.');
    }
}