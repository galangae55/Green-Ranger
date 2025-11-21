<?php

// app/Http/Controllers/GreenRangerController.php

namespace App\Http\Controllers;

use App\Models\Komen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Product;

class GreenRangerController extends Controller
{
    public function homepage(){
        return view("index");
    }

    public function produk1(){
        return view("produk1");
    }
    public function produk2(){
        return view("produk2");
    }
    public function produk3(){
        return view("produk3");
    }
    public function produk4(){
        return view("produk4");
    }
    public function produk5(){
        return view("produk5");
    }
    public function produk6(){
        return view("produk6");
    }
    public function produk7(){
        return view("produk7");
    }
    public function produk8(){
        return view("produk8");
    }
    public function produk9(){
        return view("produk9");
    }
    public function produk10(){
        return view("produk10");
    }
    public function produk11(){
        return view("produk11");
    }
    public function produk12(){
        return view("produk12");
    }

    public function shop_cart(){
        return view("shop_cart");
    }

    public function shop_checkout(){
        return view("shop_checkout");
    }

    public function donate(){
        return view("donate");
    }

    public function event(){
        return view("event");
    }

    public function blog(){
        return view("blog");
    }

    public function contact(){
        return view("contact");
    }

    public function belanja(){
        $products = Product::all();
        return view('belanja', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with('detail')->findOrFail($id);
        $relatedProducts = Product::where('id', '!=', $id)
                                ->inRandomOrder()
                                ->limit(4)
                                ->get();
        
        return view('product_detail', compact('product', 'relatedProducts'));
    }

    public function detail(){
        return view("detail", [
            'comments' => Komen::all()
        ]);
    }
    public function detail2(){
        return view("detail2", [
            'comments' => Komen::all()
        ]);
    }
    public function detail3(){
        return view("detail3", [
            'comments' => Komen::all()
        ]);
    }
    public function detail4(){
        return view("detail4", [
            'comments' => Komen::all()
        ]);
    }
    public function detail5(){
        return view("detail5", [
            'comments' => Komen::all()
        ]);
    }
    public function detail6(){
        return view("detail6", [
            'comments' => Komen::all()
        ]);
    }
    public function volunteer(){
        return view("volunteer");
    }

    public function login(){
        return view("login");
    }

    public function adminRole(Request $request)
    {
        // Cek apakah pengguna sudah login dan memiliki role 'admin'
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Alihkan jika tidak memiliki akses
            return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Tampilkan halaman admin jika memiliki akses
        return view('/adminPage');
    }

    public function daftar_transaksi(){
        return view("daftarTransaksi");
    }
}
