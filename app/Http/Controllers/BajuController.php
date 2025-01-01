<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('baju');
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

    $baju = new Baju();
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $path = $file->store('public/baju'); // Simpan foto di folder public/baju
        $baju->foto = $path;
    }
    $baju->nama_baju = $request->nama_baju;
    $baju->harga = $request->harga;
    $baju->jumlah_aksesoris = $request->jumlah_aksesoris;
    $baju->jumlah_sewa = $request->jumlah_sewa;
    $baju->save();

    return redirect()->route('bajus.index')->with('success', 'Baju berhasil ditambahkan');
}

    public function update(Request $request, Baju $baju)
    {
        $request->validate([
            'nama_baju' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_aksesoris' => 'required|string',
            'jumlah_sewa' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $data = $request->all();
    
        if ($request->hasFile('foto')) {
            if ($baju->foto) {
                Storage::disk('public')->delete($baju->foto);
            }
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }
    
        $baju->update($data);
    
        return redirect()->route('bajus.index')->with('success', 'Baju updated successfully.');
    }

    // Show the form for editing the specified baju
    public function edit(Baju $baju)
    {
        return view('baju', compact('baju'));
    }

    // Remove the specified baju from storage
    public function destroy(Baju $baju)
    {
        $baju->delete();

        return redirect()->route('bajus.index')->with('success', 'Baju deleted successfully.');
    }
}
