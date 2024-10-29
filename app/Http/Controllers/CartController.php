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



    public function removeFromCart(Request $request)
    {
        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Remove the specified product from the cart
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('shop.cart')->with('success', 'Produk berhasil dihapus dari keranjang');
    }

    public function updateCart(Request $request)
    {
        // Check if 'products' is set in the request to avoid undefined variable errors
        if ($request->has('products')) {
            // Get the current cart from the session
            $cart = session()->get('cart', []);

            // Update each product's quantity
            foreach ($request->products as $productId => $quantity) {
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] = $quantity;
                }
            }

            // Save the updated cart to the session
            session()->put('cart', $cart);

            return redirect()->route('shop.cart')->with('success', 'Jumlah produk diperbarui');
        }

        return redirect()->route('shop.cart')->with('error', 'Tidak ada produk untuk diperbarui');
    }
}
