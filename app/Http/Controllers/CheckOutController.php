<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\MetodePengiriman;

class CheckOutController extends Controller
{
    public function showOrderToCheckOut(){
        $userId = auth()->id(); // Ambil ID user yang sedang login
        $keranjangs = Keranjang::where('user_id', $userId)->with('product')->get();

        $subtotal = $keranjangs->sum(function ($keranjang) {
            return $keranjang->product->price * $keranjang->quantity;
        });

        $metode_pengiriman = MetodePengiriman::all();

        return view('shop_checkout', [
            'keranjangs' => $keranjangs,
            'subtotal' => $subtotal,
            'metode_pengiriman' => $metode_pengiriman
        ]);
    }
}
