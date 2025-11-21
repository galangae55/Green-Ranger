<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\Donation;
use App\Models\Keranjang;
use App\Models\kontak;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Volunteer;
use App\Models\Product;
use App\Models\ProductDetail;

class AdminController extends Controller
{
    // FUNGSI UNTUK MENAMPILKAN JUMLAH DATA YANG ADA PADA TABEL USER
    public function adminDashboard()
    {
        // Fungsiong Menghitung jumlah data
        $totalAccounts = User::count();
        $totalVolunteer = Volunteer::count();

        // Menghitung total donasi dengan status 'accepted'
        $totalDonations = Donation::where('status', 'accepted')->sum('amount');

        // Mengambil semua data volunteer dan kontak dari database
        $volunteers = Volunteer::all();
        $kontaks = kontak::all();

        // Mengirim data ke view admin
        return view('adminPage', compact('totalAccounts', 'volunteers', 'totalVolunteer', 'kontaks', 'totalDonations'));
    }


    public function adminVolunteer()
    {
        $volunteers = Volunteer::all();

        return view('adminVolunteer', compact('volunteers'));
    }

    public function updateStatus($id)
    {
        // Cari volunteer berdasarkan id
        $volunteer = Volunteer::findOrFail($id);

        // Ubah status: jika status saat ini 'accepted', ubah menjadi 'pending', dan sebaliknya
        if ($volunteer->status == 'accepted') {
            $volunteer->status = 'pending';
        } else {
            $volunteer->status = 'accepted';
        }

        // Simpan perubahan
        $volunteer->save();

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'Status volunteer berhasil diubah.');
    }
    public function updateStatusDonasi($id)
    {
        // Cari volunteer berdasarkan id
        $donationsss = Donation::findOrFail($id);

        // Ubah status: jika status saat ini 'accepted', ubah menjadi 'pending', dan sebaliknya
        if ($donationsss->status == 'accepted') {
            $donationsss->status = 'pending';
        } else {
            $donationsss->status = 'accepted';
        }

        // Simpan perubahan
        $donationsss->save();

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('successking', 'Status Donasi berhasil diubah.');
    }


    public function deleteVolunteer($id)
    {
        // Cari volunteer berdasarkan id
        $volunteer = Volunteer::findOrFail($id);

        // Hapus volunteer
        $volunteer->delete();

        // Notifikasi ketika berhasil terhapus
        session()->flash('success', 'Data volunteer berhasil dihapus.');

        // Redirect kembali ke halaman volunteer dengan pesan sukses
        return redirect()->route('admin.volunteer');
    }

    public function deleteKontak($id)
    {
        // Cari volunteer berdasarkan id
        $kontaks = kontak::findOrFail($id);

        // Hapus volunteer
        $kontaks->delete();

        return redirect()->route('admin.kontak')->with('success', 'Kontak berhasil dihapus!');
    }



    public function adminDonation()
    {
        $donationsss = Donation::all();

        return view('adminDonation', compact('donationsss'));
    }

    public function adminKontak()
    {
        $kontak = kontak::all();

        return view('adminKontak', compact('kontak'));
    }



    public function adminBelanja()
    {
        // Ambil barang berdasarkan status di checkouts
        $products = Keranjang::with(['product'])
            ->get();

        return view('adminBelanja', compact('products')); // Menggunakan view daftarTransaksi
    }

    public function BelanjaUpdate(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'status' => 'required|string|in:Belum Dibayar,Sedang Diproses,Sedang Dikirim,Diterima,Gagal',
        ]);

        // Cari checkout berdasarkan ID
        $checkout = CheckOut::find($id);

        if ($checkout) {
            $checkout->update(['status' => $validated['status']]);

            // Jika request dari Fetch API, kembalikan respons JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status berhasil diperbarui.',
                ]);
            }

            // Jika request biasa, redirect dengan flash message
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        }

        // Jika tidak ditemukan, kembalikan error sesuai jenis request
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Checkout tidak ditemukan.',
            ], 404);
        }

        return redirect()->back()->with('error', 'Checkout tidak ditemukan.');
    }

    public function adminProduk()
    {
        $products = Product::with('detail')->get();
        return view('adminProduk', compact('products'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            // 'category' dihapus dari validasi
            'discount_price' => 'nullable|numeric|min:0'
        ]);

        try {
            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('products', $imageName, 'public');
            }

            // Create product
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => 'storage/' . $imagePath,
            ]);

            // Create product detail tanpa category
            ProductDetail::create([
                'product_id' => $product->id,
                'description' => $request->description,
                // 'category' dihapus
                'discount_price' => $request->discount_price
            ]);

            return redirect()->route('admin.produk')->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->route('admin.produk')->with('error', 'Gagal menambahkan produk: ' . $e->getMessage());
        }
    }

    // AdminController.php
    public function editProduct($id)
    {
        $product = Product::with('detail')->findOrFail($id);
        return response()->json($product);
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'discount_price' => 'nullable|numeric|min:0'
        ]);

        try {
            $product = Product::findOrFail($id);
            
            // Update product data
            $product->name = $request->name;
            $product->price = $request->price;

            // Handle image update if new image is uploaded
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }
                
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('products', $imageName, 'public');
                $product->image = 'storage/' . $imagePath;
            }

            $product->save();

            // Update or create product detail
            $productDetail = ProductDetail::where('product_id', $id)->first();
            if (!$productDetail) {
                $productDetail = new ProductDetail();
                $productDetail->product_id = $id;
            }
            
            $productDetail->description = $request->description;
            $productDetail->discount_price = $request->discount_price;
            $productDetail->save();

            return redirect()->route('admin.produk')->with('success', 'Produk berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('admin.produk')->with('error', 'Gagal mengupdate produk: ' . $e->getMessage());
        }
    }

    public function deleteProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            
            // Delete product image if exists
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            
            // Delete product detail first
            if ($product->detail) {
                $product->detail->delete();
            }
            
            // Delete product
            $product->delete();
            
            return redirect()->route('admin.produk')->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.produk')->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }

    public function adminAkun()
    {
        // Ambil barang berdasarkan status di checkouts
        $users = User::all();

        return view('adminAkun', compact('users')); // Menggunakan view daftarTransaksi
    }

    public function deleteAkun($id)
    {
        // Cari volunteer berdasarkan id
        $users = User::findOrFail($id);

        // Hapus volunteer
        $users->delete();

        // Notifikasi ketika berhasil terhapus
        session()->flash('success', 'Data akun berhasil dihapus.');

        // Redirect kembali ke halaman volunteer dengan pesan sukses
        return redirect()->route('admin.akun');
    }

    public function updateRole($id)
    {
        // Cari volunteer berdasarkan id
        $users = User::findOrFail($id);

        // Ubah status: jika status saat ini 'accepted', ubah menjadi 'pending', dan sebaliknya
        if ($users->role == 'admin') {
            $users->role = 'user';
        } else {
            $users->role = 'admin';
        }

        // Simpan perubahan
        $users->save();

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'Role berhasil diubah.');
    }

}
