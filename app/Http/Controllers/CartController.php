<?php

// App\Http\Controllers\CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showBiodataForm()
    {
        return view('biodata'); // Ganti dengan nama view yang sesuai
    }

    public function storeBiodata(Request $request)
    {
        // Validasi biodata
        $request->validate([
            'nama_penyewa' => 'required|string',
            'email' => 'required|email',
        ]);

        // Simpan nama penyewa ke sesi
        session()->put('biodata.nama_penyewa', $request->nama_penyewa);

        return redirect()->route('cart.index'); // Kembali ke halaman keranjang
    }

    // App\Http\Controllers\CartController.php

public function index()
{
    $cart = session()->get('cart.items', []);
    $biodata = session()->get('biodata'); // Assuming biodata is stored in the session
    
    return view('cart', compact('cart', 'biodata')); // Passing biodata to the view
}


    public function addToCart(Request $request)
    {
        // Validasi dan proses penambahan item ke keranjang
        $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|integer|min:1|max:10',
            'total' => 'required|numeric',
            'category' => 'required|string',
        ]);

        $total = $request->quantity * $request->total;

        $item = [
            'product_name' => $request->product_name,
            'quantity' => $request->quantity,
            'total' => $total,
            'category' => $request->category,
        ];

        session()->push('cart.items', $item);

        return response()->json(['message' => 'Item berhasil ditambahkan ke keranjang']);
    }

    public function remove(Request $request)
    {
        // Hapus item dari keranjang
        $cart = session()->get('cart.items', []);
        unset($cart[$request->input('index')]);

        session()->put('cart.items', $cart);

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus');
    }
}
