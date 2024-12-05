<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Http\Request;

class DaftarTransaksiController extends Controller
{
    public function showPesanan()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login

        // Ambil barang berdasarkan status di checkouts
        $products = Keranjang::with(['product', 'checkouts.metode_pengiriman']) // Muat relasi checkouts dan metode_pengiriman
            ->where('user_id', $userId)
            ->get();

        return view('daftarTransaksi', compact('products')); // Menggunakan view daftarTransaksi
    }

    public function UpdatePesanan($id)
    {
        $checkout = CheckOut::find($id);

        if ($checkout && $checkout->status == 'Sedang Dikirim') {
            $checkout->update(['status' => 'Diterima']);
            return redirect()->back()->with('successSlskn', 'terima kasih sudah berbelanja.');
        }

        return redirect()->back()->with('error', 'Gagal.');
    }



}
