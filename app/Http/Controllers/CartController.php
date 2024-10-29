<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Keranjang;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Mengambil produk dari database
        $product = Product::find($validatedData['product_id']);

        if ($product) {
            // Menghitung total harga
            $totalPrice = $product->price * $validatedData['quantity'];

            // Menyimpan ke tabel carts
            Keranjang::create([
                'user_id' => auth()->id(), // Mengambil ID pengguna yang sedang login
                'product_id' => $validatedData['product_id'],
                'quantity' => $validatedData['quantity'],
                'total_price' => $totalPrice,
            ]);

            return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
        }

        return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    
    public function showCart()
    {
        // Retrieve the cart data from the session
        $cart = session()->get('cart', []);

        // Pass the cart to the view
        return view('shop_cart', compact('cart'));
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
