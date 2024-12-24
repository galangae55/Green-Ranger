<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class CartController extends Controller
{
    // CartController.php
    public function addToCart(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Anda harus login terlebih dahulu untuk menambahkan produk ke keranjang.');
        }

        // Log data request untuk debug
        Log::info('Request Data:', $request->all());

        // Validasi input
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Temukan pengguna yang sedang login
        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Cari harga produk berdasarkan product_id
        $product = Product::find($productId);
        if (!$product) {
            return back()->withErrors(['error' => 'Produk tidak ditemukan.']);
        }

        // Hitung total harga
        $totalPrice = $product->price * $quantity;

        // Simpan data ke tabel keranjang
        Keranjang::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'status' => 'Belum Di Check Out', // Set status secara otomatis
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }


    public function showCart()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login

        // Hanya ambil barang dengan status 'Belum Di Check Out'
        $products = Keranjang::with('product')
            ->where('user_id', $userId)
            ->where('status', 'Belum Di Check Out')
            ->get();

        return view('shop_cart', compact('products')); // Menggunakan view shop_cart
    }


    public function removeFromCart($id)
    {
        $cartItem = Keranjang::findOrFail($id);

        // Hapus volunteer
        $cartItem->delete();

        // session()->flash('success', 'Data Keranjang berhasil dihapus.');

        // Redirect kembali ke halaman volunteer dengan pesan sukses
        return redirect()->back()->with('success', 'Data Keranjang berhasil dihapus.');

    }


    // $userId = auth()->id();

    // Keranjang::where('user_id', $userId)
    //         ->where('status', 'Belum Di Check Out')
    //         ->update(['status' => 'Check Out']);

    public function updateCart(Request $request)
    {
        $cartItem = Keranjang::findOrFail($request->product_id); // Temukan item berdasarkan ID
        $cartItem->quantity = $request->quantity; // Perbarui jumlah
        $cartItem->save(); // Simpan perubahan

        return response()->json(['success' => true, 'message' => 'Keranjang berhasil diperbarui.']);
    }
}
