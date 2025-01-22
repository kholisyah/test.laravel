<?php

namespace App\Http\Controllers;

use App\Models\Baju;
use App\Models\Cart;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutSummary()
    {
        // $carts = Cart::all();
    }

    public function checkout(Request $request, $id)
    {
        dd($request->all());
        $cart = Cart::findOrFail($id);
    }
}