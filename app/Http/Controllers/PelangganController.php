<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    // Fungsi untuk menghapus pelanggan berdasarkan ID
    public function destroy($id) // Baris 10
    {
        $pelanggan = Pelanggan::find($id); // Baris 12
        
        if ($pelanggan) { // Baris 14
            $pelanggan->delete(); // Baris 15
            return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.'); // Baris 16
        } 
        return redirect()->route('pelanggan.index')->with('error', 'Pelanggan tidak ditemukan.'); // Baris 18
    }
    
    // Fungsi untuk menampilkan halaman edit berdasarkan ID
    public function edit($id) // Baris 23
    {
        $pelanggan = Pelanggan::find($id);  // Baris 25
        $pelanggan = Pelanggan::findOrFail($id); // Baris 26, memastikan ID valid

        return view('edit', compact('pelanggan')); // Baris 29, menampilkan halaman edit
    }

    // Fungsi untuk mengupdate data pelanggan yang telah diedit
    public function update(Request $request, $id) // Baris 33
    {
        // Validasi input
        $validated = $request->validate([ // Baris 35
            'nama' => 'required|string|max:255', // Baris 36
            'nomor_telpon' => 'required|string|max:15', // Baris 37
            'alamat' => 'required|string|max:255', // Baris 38
            'email' => 'required|email|max:255', // Baris 39
        ]);

        // Cari pelanggan berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id); // Baris 42

        // Update data pelanggan
        $pelanggan->update($validated); // Baris 45

        // Redirect ke halaman daftar pelanggan dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diupdate.'); // Baris 48
    }

    // Fungsi untuk menampilkan layar edit dengan pelanggan yang dipilih
    public function showEditScreen(Pelanggan $pelanggan) // Baris 53
    {
        return view('index',['pelanggan'=>$pelanggan]); // Baris 54, menampilkan pelanggan di view index
    }

    // Fungsi untuk menampilkan semua data pelanggan
    public function index()
    {
        $pelanggans = Pelanggan::all(); // Mengambil semua data pelanggan
        return view('index', compact('pelanggans'));
    }
    

    // Fungsi untuk menyimpan data pelanggan baru
    public function store(Request $request) // Baris 65
    {
        // Validasi data
        $request->validate([ // Baris 67
            'nama' => 'required', // Baris 68
            'nomor_telpon' => 'required', // Baris 69
            'alamat' => 'required', // Baris 70
            'email' => 'required|email' // Baris 71
        ]);
    
        // Simpan data ke database
        $pelanggan = Pelanggan::create([ // Baris 74
            'nama' => $request->nama, // Baris 75
            'nomor_telpon' => $request->nomor_telpon, // Baris 76
            'alamat' => $request->alamat, // Baris 77
            'email' => $request->email, // Baris 78
        ]);
    
        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data pelanggan berhasil ditambahkan!'); // Baris 81
    }
}
