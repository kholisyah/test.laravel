<?php

// App\Http\Controllers\CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
{
    $cartItems = session('cart.items', []); // Ambil data keranjang dari sesi
    return view('cart', compact('cartItems'));
}

   public function addToCart(Request $request)
{
    $item = [
        'product_name' => $request->product_name,
        'quantity' => $request->quantity,
        'total' => $request->total,
    ];

    // Simpan item ke sesi keranjang
    session()->push('cart.items', $item);

    // Kembalikan respons JSON
    return response()->json(['message' => 'Item berhasil ditambahkan ke keranjang']);
}


    // Menambahkan produk ke cart
    public function add(Request $request)
    {
        // Ambil data cart dari sesi
        $cart = session()->get('cart', []);

        // Siapkan produk yang akan ditambahkan
        $product = [
            'product_name' => $request->input('product_name'),
            'quantity' => $request->input('quantity'),
            'total' => $request->input('total'),
        ];

        // Tambahkan produk ke cart
        $cart[] = $product;

        // Simpan kembali ke sesi
        session()->put('cart', $cart);

        // Cek apakah produk berhasil ditambahkan
        session()->flash('success', 'Produk berhasil ditambahkan ke keranjang!');

        // Redirect ke halaman cart
        return redirect()->route('cart.index');
    }

    // Menampilkan cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Menghapus produk dari cart
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->input('index')]);

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }
}