<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{

public function sendWhatsAppMessage($to, $message) {
    $apiKey = env('ZYwGTa1u1VS5wRdtWda8'); // Ambil API Key dari .env
    $sender = env('+6281351244556'); // Nomor WhatsApp yang digunakan (dari Fonnte)
    
    $client = new Client();

    // Endpoint Fonnte untuk mengirim pesan
    $url = 'https://api.fonnte.com/v1/send';

    $response = $client->post($url, [
        'json' => [
            'api_key' => $apiKey, // API Key
            'sender' => $sender,  // Nomor pengirim
            'to' => $to,          // Nomor tujuan
            'message' => $message // Isi pesan
        ]
    ]);

    $body = $response->getBody();
    $data = json_decode($body, true);

    // Cek apakah pesan berhasil terkirim
    if (isset($data['status']) && $data['status'] == 'success') {
        return true;
    }

    return false;
}

public function storeFromCart(Request $request)
{
    $cart = session()->get('cart.items', []);

    foreach ($cart as $item) {
        // Ensure 'total' exists in the cart item
        if (isset($item['total'])) {
            Transaksi::create([
                'status' => 'pending',
                'total' => $item['total'],
                'tanggal' => now(),
            ]);
        } else {
            // Handle missing total, maybe log an error or set a default value
            Transaksi::create([
                'status' => 'pending',
                'total' => 10000, // Default value
                'tanggal' => now(),
            ]);

        }
    }

    // Kosongkan keranjang
    session()->forget('cart');

    return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat!');
}


    
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
    $transaksis = Transaksi::all(); // or use proper query if filtering is needed
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