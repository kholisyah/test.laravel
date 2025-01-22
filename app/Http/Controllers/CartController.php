<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use App\Models\Cart;
use App\Models\checkout;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function checkoutSummary()
    {
        // Ambil data checkout dari session
        $checkoutItems = checkout::get();
        // Hitung total harga
        $totalPrice = $checkoutItems->sum(function ($item) {
            return ($item['prices'] ?? 0) * ($item['quantity'] ?? 1);
        });
        
        return view('checkout-summary', compact('checkoutItems', 'totalPrice'));
    }

    public function checkout(Request $request, $id)
    {   
        $cart = Cart::findOrFail($id);
        // dd($cart);

        // // Ambil item yang dipilih dari form
        // $selectedItems = $request->input('selected_items', []);
        // // dd($selectedItems);
        
        // // Ambil data dari session cart
        // $cart = session('cart', []);

        // // Filter hanya item yang dipilih
        // $selectedCartItems = collect($cart)->only($selectedItems);
    
        // // Simpan data checkout di session untuk halaman berikutnya
        // session(['checkout_items' => $selectedCartItems]);

        $checkout = new Checkout();
        $checkout->id_baju = $cart->id_baju;
        $checkout->product_name = $cart->product_name;
        $checkout->quantity = $cart->quantity;
        $checkout->prices = $cart->prices;
        $checkout->total = $cart->total;
        $checkout->status = 'pending';
        $checkout->save();
    
        // Redirect ke halaman ringkasan checkout
        return redirect()->route('checkout.summary');
    }
    
    public function index()
    {


        // Retrieve the cart from the session
        $cart = Cart::all();
        // $cart = session('cart', []);
        // dd($cart);

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
            // Update stok baju
            $baju->update([
                'stok' => $baju->stok - $jumlah,
            ]);

            $cart = Cart::create([
                'id_baju' => $id,
                'foto' => $baju->foto,
                'product_name' => $baju->nama,
                'quantity' => $jumlah,
                'prices' => $baju->harga_sewa,
                'total' => $baju->harga_sewa * $jumlah,
                'category' => $baju->kategori,
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

    public function deleteToCart(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        
        // Update stok baju
        $baju = Baju::findOrFail($cart->id_baju);
        $baju->update([
            'stok' => $baju->stok + $cart->quantity,
        ]);
        $cart->delete();
        
        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang!');
    }
}
