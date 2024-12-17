<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    
    public function showPaymentPage($id)
{
    // Cari transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Kirim data transaksi ke view payment
    return view('payment', compact('transaksi'));
}

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'status' => 'required|string',
        'total' => 'required|numeric|min:0',
        'tanggal' => 'required|date',
    ]);

    // Temukan transaksi
    $transaksi = Transaksi::findOrFail($id);

    // Update data transaksi
    $transaksi->status = $request->status;
    $transaksi->total = $request->total;
    $transaksi->tanggal = $request->tanggal;
    $transaksi->save();

    // Redirect dengan pesan sukses
    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diperbarui!');
}

    public function edit($id)
{
    // Cari transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Kirim data transaksi ke view edit
    return view('edit-transaksi', compact('transaksi'));
}
    public function destroy($id)
{
    // Cari transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Hapus transaksi
    $transaksi->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
}
    public function updateStatus($id)
{
    // Cari transaksi berdasarkan ID
    $transaksi = Transaksi::findOrFail($id);

    // Perbarui status transaksi menjadi "lunas"
    $transaksi->status = 'lunas';
    $transaksi->save();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('transaksi.index')->with('success', 'Status transaksi berhasil diubah menjadi lunas!');
}

    // Menampilkan semua transaksi
    public function index()
    {
        // Mengambil semua data transaksi
        $transaksis = Transaksi::all();
        return view('transaksi', compact('transaksis'));

    }

    // Menampilkan halaman form untuk transaksi baru
    public function create()
    {
        return view('transaksi.create');
    }

    // Menyimpan transaksi baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'status' => 'required|string',
            'total' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        // Membuat transaksi baru
        Transaksi::create($validated);

        // Redirect ke halaman index transaksi dengan pesan sukses
        return redirect()->route('transaksi.index')
                         ->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
