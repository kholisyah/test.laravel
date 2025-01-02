<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function lihatPenyewaan()
{
    $pesanan = session()->get('cart.items', []);

    // Tambahkan ini untuk debugging
    if (empty($pesanan)) {
        return "Keranjang masih kosong. Tambahkan item terlebih dahulu.";
    }

    return view('penyewaan', compact('pesanan'));
}

}
