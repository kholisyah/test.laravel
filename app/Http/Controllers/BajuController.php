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
        $request->validate([
            'nama_baju' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jumlah_aksesoris' => 'required|string',
            'jumlah_sewa' => 'required|string'
        ]);

        Baju::create($request->all());

        return redirect()->route('bajus.index')->with('success', 'Baju created successfully.');
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

        return redirect()->route('bajus.index')->with('success', 'Baju updated successfully.');
    }

    // Remove the specified baju from storage
    public function destroy(Baju $baju)
    {
        $baju->delete();

        return redirect()->route('bajus.index')->with('success', 'Baju deleted successfully.');
    }
}
