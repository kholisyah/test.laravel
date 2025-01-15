<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkoutSummary()
{
    // Ambil data checkout dari session
    $checkoutItems = session('checkout_items', collect());

    // Hitung total harga
    $totalPrice = $checkoutItems->sum(function ($item) {
        return ($item['harga_sewa'] ?? 0) * ($item['jumlah'] ?? 1);
    });

    return view('checkout-summary', compact('checkoutItems', 'totalPrice'));
}

    public function checkout(Request $request)
    {
        // Ambil item yang dipilih dari form
        $selectedItems = $request->input('selected_items', []);
    
        // Ambil data dari session cart
        $cart = session('cart', []);
    
        // Filter hanya item yang dipilih
        $selectedCartItems = collect($cart)->only($selectedItems);
    
        // Simpan data checkout di session untuk halaman berikutnya
        session(['checkout_items' => $selectedCartItems]);
    
        // Redirect ke halaman ringkasan checkout
        return redirect()->route('checkout.summary');
    }
    
    public function index()
{
    // Retrieve the cart from the session
    $cart = session()->get('cart', []);

    // Return the cart view and pass the cart data
    return view('cart', compact('cart'));
}

public function addToCart(Request $request, $id)
{
    $baju = Baju::findOrFail($id);

    // Validasi jumlah yang disewa
    $request->validate([
        'jumlah' => 'required|integer|min:1|max:' . $baju->stok,
    ]);

    $jumlah = $request->input('jumlah');

    if ($baju->stok >= $jumlah) {
        // Kurangi stok baju
        $baju->stok -= $jumlah;
        $baju->save();

        // Tambahkan ke keranjang
        session()->push('cart', [
            'id' => $baju->id,
            'nama' => $baju->nama,
            'kategori' => $baju->kategori,
            'jumlah' => $jumlah,
            'harga_sewa' => $baju->harga_sewa,
            'foto' => $baju->foto,
        ]);
        

        return redirect()->back()->with('success', 'item berhasil ditambahkan ke keranjang!');
    }

    return redirect()->back()->with('error', 'Stok tidak mencukupi.');
}


    public function showCart()
    {
        // Get the cart from the session
        $cart = session()->get('cart', []);

        return view('cart', compact('cart'));
    }
}
