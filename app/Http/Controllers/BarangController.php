<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    // Menampilkan daftar semua barang
    public function index()
    {
        $barangs = Barang::all(); // Mengambil semua data barang
        return view('barang', compact('barangs')); // Mengirim data barang ke view
    }

    // Menampilkan form untuk membuat barang baru
    public function create()
    {
        return view('create_barang'); // Mengarahkan ke view untuk form input barang
    }

    // Menyimpan barang baru ke database
    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|string',
            'warna' => 'required|string',
            'harga_sewa' => 'required|numeric',
            'jenis' => 'required|string',
            'stok' => 'required|numeric',
            'aksesoris' => 'required|numeric',
        ]);

        $barang = new Barang();
        $barang->nama = $request->nama;
        $barang->kategori = $request->kategori;
        $barang->warna = $request->warna;
        $barang->harga_sewa = $request->harga_sewa;
        $barang->jenis = $request->jenis;
        $barang->stok = $request->stok;
        $barang->aksesoris = $request->aksesoris;
        $barang->save();

        return redirect()->back()->with('success', 'Data barang berhasil disimpan.'); // Mengarahkan kembali dengan pesan sukses
    }

    // Menampilkan detail dari barang tertentu
    public function show($id)
    {
        $barang = Barang::find($id); // Mencari barang berdasarkan ID

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang tidak ditemukan.'); // Pesan error jika barang tidak ditemukan
        }

        return view('show_barang', compact('barang')); // Menampilkan detail barang
    }

    // Menampilkan form untuk mengedit barang
    public function edit($id_barang)
    {
        $barang = Barang::find($id_barang); // Mencari barang berdasarkan ID

        if ($barang) {
            return view('edit_barang', compact('barang')); // Mengirim data barang ke view edit
        } else {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.'); // Pesan error jika barang tidak ditemukan
        }
    }

    // Memperbarui data barang yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'warna' => 'required|string',
            'harga_sewa' => 'required|numeric',
            'jenis' => 'required|string',
            'stok' => 'required|integer',
            'aksesoris' => 'required|integer',
        ]);

        $barang = Barang::find($id); // Mencari barang berdasarkan ID

        if ($barang) {
            // Memperbarui data barang
            $barang->nama = $request->input('nama');
            $barang->kategori = $request->input('kategori');
            $barang->warna = $request->input('warna');
            $barang->harga_sewa = $request->input('harga_sewa');
            $barang->jenis = $request->input('jenis');
            $barang->stok = $request->input('stok');
            $barang->aksesoris = $request->input('aksesoris');
            $barang->save();

            return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui.'); // Pesan sukses setelah pembaruan
        } else {
            return redirect()->back()->with('error', 'Data barang tidak ditemukan.'); // Pesan error jika barang tidak ditemukan
        }
    }

    // Menghapus barang dari database
    public function destroy($id_barang)
    {
        $barang = Barang::find($id_barang); // Mencari barang berdasarkan ID
        
        if ($barang) {
            $barang->delete(); // Menghapus barang
            return redirect()->back()->with('success', 'Barang berhasil dihapus.'); // Pesan sukses setelah penghapusan
        } else {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.'); // Pesan error jika barang tidak ditemukan
        }
    }

    // Mencari barang berdasarkan nama atau kategori
    public function search(Request $request)
    {
        $query = $request->input('query'); // Mengambil input pencarian dari pengguna
        $barangs = Barang::where('nama', 'LIKE', "%$query%")
                         ->orWhere('kategori', 'LIKE', "%$query%")
                         ->get(); // Mencari barang berdasarkan nama atau kategori

        return view('barang', compact('barangs')); // Mengirim hasil pencarian ke view
    }

    // Mencetak daftar barang
    public function print()
    {
        $barangs = Barang::all(); // Mengambil semua data barang
        return view('print_barang', compact('barangs')); // Mengirim data barang untuk dicetak
    }
}

