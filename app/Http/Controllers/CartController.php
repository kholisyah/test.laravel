<?php

// App\Http\Controllers\CartController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CartController extends Controller
{
    public function index()
{
    $cart = session()->get('cart.items', []); // Ambil item dari sesi
    return view('cart', compact('cart')); // Pastikan ada view bernama 'cart'
}

    public function addToCart(Request $request)
{
    $item = [
        'product_name' => $request->product_name,
        'quantity' => $request->quantity,
        'total' => $request->total,
        'category' => $request->kategori, // Perbaiki kunci ini
    ];

    session()->push('cart.items', $item);

    return response()->json(['message' => 'Item berhasil ditambahkan ke keranjang']);
}


public function remove(Request $request)
{
    $cart = session()->get('cart.items', []); // Gunakan kunci yang sesuai
    unset($cart[$request->input('index')]);

    session()->put('cart.items', $cart); // Perbarui kembali ke sesi

    return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus');
}


    public function viewCart()
    {
        $cartItems = session()->get('cart.items', []); // Format kunci sesuai
        return view('cart', compact('cartItems'));
    }
    

    // Menambahkan produk ke cart
    public function add(Request $request)
{
    $cart = session()->get('cart', []);

    $product = [
        'product_name' => $request->input('product_name'),
        'quantity' => $request->input('quantity'),
        'total' => $request->input('total'),
        'category' => $request->input('category'), // Tambahkan kategori
    ];

    $cart[] = $product;

    session()->put('cart', $cart);

    session()->flash('success', 'Produk berhasil ditambahkan ke keranjang!');

    return redirect()->route('cart.index');
}

}