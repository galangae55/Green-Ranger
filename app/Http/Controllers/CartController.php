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
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        // Temukan pengguna yang sedang login
        $productId = $request->product_id;
        $quantity = $request->quantity;

        // Cari harga produk berdasarkan product_id
        $product = Product::find($productId);
        if (!$product) {
            return back()->withErrors(['Product not found']);
        }

        // Hitung total harga
        $totalPrice = $product->price * $quantity;

        // Simpan data ke tabel keranjang
        Keranjang::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }





    public function showCart()
    {
        $userId = auth()->id();
        $products = Keranjang::with('product')->where('user_id', $userId)->get();



        return view('shop_cart', compact('products')); // Menggunakan view shop_cart
    }

    public function removeFromCart($id)
    {
        $keranjangItem = Keranjang::find($id);

        if ($keranjangItem) {
            $keranjangItem->delete(); // Hapus item dari keranjang
            return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.'); // Redirect kembali dengan pesan sukses
        }

        return redirect()->back()->with('error', 'Item tidak ditemukan.'); // Jika item tidak ditemukan
    }

    public function updateCart(Request $request)
    {
        // Loop through each product in the cart and update its quantity
        foreach ($request->product_id as $key => $id) {
            $cartItem = Keranjang::find($id);

            // Check if cart item exists
            if ($cartItem) {
                $quantity = $request->quantity[$key];
                $cartItem->quantity = max(1, (int)$quantity); // Ensure quantity is at least 1
                $cartItem->save();
            }
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
}
