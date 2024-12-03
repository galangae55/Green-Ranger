<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Keranjang;
use App\Models\MetodePengiriman;
use App\Models\User;

class CheckOutController extends Controller
{
    public function showOrderToCheckOut()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login

        // Hanya ambil barang dengan status 'Belum Di Check Out'
        $keranjangs = Keranjang::where('user_id', $userId)
            ->where('status', 'Belum Di Check Out') // Hanya yang statusnya 'Belum Di Check Out'
            ->with('product') // Ambil relasi produk
            ->get();

        // Hitung subtotal dari barang yang ada di keranjang
        $subtotal = $keranjangs->sum(function ($keranjang) {
            return $keranjang->product->price * $keranjang->quantity;
        });

        // Ambil semua metode pengiriman
        $metode_pengiriman = MetodePengiriman::all();

        return view('check_out', [
            'keranjangs' => $keranjangs,
            'subtotal' => $subtotal,
            'metode_pengiriman' => $metode_pengiriman
        ]);
    }



    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'billing_address_1' => 'required|string',
            'billing_city' => 'required|string',
            'billing_postcode' => 'required|string',
            'billing_phone' => 'required|string',
            'metode_pengiriman_id' => 'required|integer',
            'order_comments' => 'nullable|string',
            'billing_address_2' => 'nullable|string',
        ]);

        // Ambil ID user yang sedang login
        $userId = auth()->id();

        // Ambil data keranjang milik user yang belum di checkout
        $keranjangs = Keranjang::where('user_id', $userId)
            ->where('status', 'Belum Di Check Out')
            ->get();

        // Hitung subtotal (harga seluruh barang yang di-checkout)
        $subtotal = $keranjangs->sum(function ($keranjang) {
            return $keranjang->product->price * $keranjang->quantity;
        });

        // Ambil data biaya pengiriman berdasarkan pilihan metode pengiriman
        $metodePengiriman = MetodePengiriman::find($validatedData['metode_pengiriman_id']);
        $shippingCost = $metodePengiriman->price;

        // Hitung total_akhir (subtotal + biaya pengiriman)
        $totalAkhir = $subtotal + $shippingCost;

        // Buat data checkout
        $checkout = Checkout::create([
            'user_id' => $userId,
            'metode_pengiriman_id' => $validatedData['metode_pengiriman_id'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'billing_address_1' => $validatedData['billing_address_1'],
            'billing_address_2' => $validatedData['billing_address_2'] ?? null,
            'billing_city' => $validatedData['billing_city'],
            'billing_postcode' => $validatedData['billing_postcode'],
            'billing_phone' => $validatedData['billing_phone'],
            'subtotal' => $subtotal,  // Harga seluruh barang
            'total_akhir' => $totalAkhir, // Total harga akhir (subtotal + biaya pengiriman)
            'status' => 'Gagal', // Status default
            'order_comments' => $validatedData['order_comments'],
        ]);

        // Menyimpan relasi checkout dan keranjang (many-to-many)
        $checkout->keranjangs()->attach($keranjangs->pluck('id'));

        // Update status keranjang menjadi 'Check Out'
        Keranjang::whereIn('id', $keranjangs->pluck('id'))->update(['status' => 'Check Out']);

        return redirect()->back()->with('success', 'Barang anda sudah berhasil di check out, SEGERA LAKUKAN PEMBAYARAN!!!.');
    }

}
