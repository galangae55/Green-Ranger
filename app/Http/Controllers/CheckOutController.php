<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\MetodePengiriman;
use App\Models\User;

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

    public function create()
    {
        // Ambil data dari sesi keranjang atau session yang sudah ada
        $keranjang = Keranjang::where('user_id', User::id())->get();

        // Ambil metode pengiriman yang tersedia
        $metode_pengiriman = MetodePengiriman::all();

        return view('checkout.create', compact('keranjang', 'metode_pengiriman'));
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'billing_address_1' => 'required|string|max:255',
            'billing_city' => 'required|string|max:255',
            'billing_postcode' => 'required|string|max:10',
            'billing_phone' => 'required|string|max:20',
            'total_harga' => 'required|numeric',
            'metode_pengiriman_id' => 'required|exists:metode_pengirimen,id',
            'order_comments' => 'nullable|string|max:255',
        ]);

        // Simpan data checkout
        $checkout = new CheckOut();
        $checkout->user_id = User::id();  // Menggunakan email berdasarkan login
        $checkout->keranjang_id = $request->keranjang_id;  // Asumsi keranjang_id diterima di form
        $checkout->metode_pengiriman_id = $request->metode_pengiriman_id;
        $checkout->first_name = $request->first_name;
        $checkout->last_name = $request->last_name;
        $checkout->billing_address_1 = $request->billing_address_1;
        $checkout->billing_address_2 = $request->billing_address_2;
        $checkout->billing_city = $request->billing_city;
        $checkout->billing_postcode = $request->billing_postcode;
        $checkout->billing_phone = $request->billing_phone;
        $checkout->total_harga = $request->total_harga;
        $checkout->status = 'Belum Dibayar'; // Set status awal
        $checkout->order_comments = $request->order_comments;
        $checkout->save();

        // Proses lain setelah checkout seperti pengurangan stok, dll

        return redirect()->route('checkout.success')->with('success', 'Checkout berhasil!');
    }
}
