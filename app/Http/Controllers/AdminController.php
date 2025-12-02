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
use App\Models\Event;
use App\Models\DetailAcara;
use App\Models\Blog;
use App\Models\CategoryBlog;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 


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

    public function adminEvent()
    {
        $events = Event::latest()->get();
        return view('adminEvent', compact('events'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'required|date',
            'time' => 'required|string',
            'location' => 'required|string|max:255',

            // Detail Acara
            'schedule' => 'nullable|array',
            'schedule.*.time' => 'required|string',
            'schedule.*.activity' => 'required|string',

            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:1024'
        ]);

        // Upload main image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $validated['image'] = $imagePath;
        }

        // Create event
        $event = Event::create($validated);

        // Upload gallery images
        $galleryPaths = [];
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $galleryPaths[] = $galleryImage->store('events/gallery', 'public');
            }
        }

        // Create detail acara
        DetailAcara::create([
            'event_id' => $event->id,
            'schedule' => $request->schedule ?? [],
            'gallery' => $galleryPaths
        ]);

        return redirect()->route('admin.event')->with('success', 'Event berhasil dibuat!');
    }

    public function show($id)
    {
        $event = Event::with('detail')->findOrFail($id);

        // Pastikan schedule & gallery selalu berbentuk array
        if ($event->detail) {
            $event->detail->schedule = $event->detail->schedule ?? [];
            $event->detail->gallery = $event->detail->gallery ?? [];
        }

        return response()->json($event);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete main image
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        // Delete gallery images
        if ($event->detail && $event->detail->gallery) {
            foreach ($event->detail->gallery as $galleryImage) {
                if (Storage::disk('public')->exists($galleryImage)) {
                    Storage::disk('public')->delete($galleryImage);
                }
            }
        }

        // Delete detail acara
        if ($event->detail) {
            $event->detail()->delete();
        }

        // Delete event
        $event->delete();

        return redirect()->route('admin.event')->with('success', 'Event berhasil dihapus!');
    }

    public function edit($id)
    {
        $event = Event::with('detail')->findOrFail($id);
        return view('admin.event-edit', compact('event')); // Opsional jika butuh form edit terpisah
    }

    public function update(Request $request, $id)
    {
        $event = Event::with('detail')->findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events,slug,' . $id,
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'date' => 'required|date',
            'time' => 'required|string',
            'location' => 'required|string|max:255',

            // Detail Acara
            'schedule' => 'nullable|array',
            'schedule.*.time' => 'required|string',
            'schedule.*.activity' => 'required|string',

            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:1024'
        ]);

        // Upload main image jika ada yang baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }
            $imagePath = $request->file('image')->store('events', 'public');
            $validated['image'] = $imagePath;
        }

        // Update event
        $event->update($validated);

        // Handle gallery images
        $existingGallery = $event->detail->gallery ?? [];
        $newGalleryPaths = [];

        // Jika ada gambar baru di galeri
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $galleryImage) {
                $newGalleryPaths[] = $galleryImage->store('events/gallery', 'public');
            }
        }

        // Gabungkan gallery lama dengan yang baru
        $galleryPaths = array_merge($existingGallery, $newGalleryPaths);

        // Update atau create detail acara
        $detailData = [
            'schedule' => $request->schedule ?? [],
            'gallery' => $galleryPaths
        ];

        if ($event->detail) {
            $event->detail->update($detailData);
        } else {
            DetailAcara::create(array_merge($detailData, ['event_id' => $event->id]));
        }

        return redirect()->route('admin.event')->with('success', 'Event berhasil diperbarui!');
    }


        // ===========================================================================================

        public function blogManagement()
        {
            $blogs = Blog::with('category', 'tags', 'comments')->latest()->get();
            $categories = CategoryBlog::withCount('blogs')->latest()->get();
            $tags = Tag::withCount('blogs')->latest()->get();
            $comments = Comment::with('blog')->latest()->get();
            
            return view('adminBlog', compact('blogs', 'categories', 'tags', 'comments'));
        }

        public function storeBlog(Request $request)
        {
            \Log::info('Store Blog Request:', $request->all());
            
            $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'required|string|max:500',
                'content' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'author' => 'nullable|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'tags' => 'nullable|array',
                'is_published' => 'boolean'
            ]);

            $imagePath = $request->file('image')->store('blogs', 'public');

            $blog = Blog::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'image' => $imagePath,
                'author' => $request->author,
                'category_id' => $request->category_id,
                'is_published' => $request->has('is_published'),
            ]);

            if ($request->has('tags')) {
                $blog->tags()->attach($request->tags);
            }

            return redirect()->route('admin.blog-management')->with('success', 'Blog created successfully.');
        }

        public function updateBlog(Request $request, $id)  // Ganti parameter ini
        {
            \Log::info('Update Blog Request ID ' . $id . ':', $request->all());
            
            $blog = Blog::findOrFail($id);
            
            $request->validate([
                'title' => 'required|string|max:255',
                'excerpt' => 'required|string|max:500',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'author' => 'nullable|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'tags' => 'nullable|array',
                'is_published' => 'boolean'
            ]);

            if ($request->hasFile('image')) {
                // Delete old image
                if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                    Storage::disk('public')->delete($blog->image);
                }
                $imagePath = $request->file('image')->store('blogs', 'public');
                $blog->image = $imagePath;
            }

            $blog->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),  // Generate slug dari title
                'excerpt' => $request->excerpt,
                'content' => $request->content,
                'author' => $request->author,
                'category_id' => $request->category_id,
                'is_published' => $request->has('is_published'),
            ]);

            // Handle tags
            if ($request->has('tags')) {
                $blog->tags()->sync($request->tags);
            } else {
                $blog->tags()->detach();
            }

            return redirect()->route('admin.blog-management')->with('success', 'Blog updated successfully.');
        }

        public function destroyBlog(Blog $blog)
        {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            $blog->tags()->detach();
            $blog->comments()->delete();
            $blog->delete();

            return redirect()->route('admin.blog-management')->with('success', 'Blog deleted successfully.');
        }

        public function storeCategory(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255|unique:categories',
                'description' => 'nullable|string'
            ]);

            CategoryBlog::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description
            ]);

            return redirect()->route('admin.blog-management')->with('success', 'Category created successfully.');
        }

        public function updateCategory(Request $request, $id)
        {
            \Log::info('Update Category Request ID ' . $id . ':', $request->all());
            
            $category = CategoryBlog::findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
                'description' => 'nullable|string'
            ]);

            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description
            ]);

            return redirect()->route('admin.blog-management')->with('success', 'Category updated successfully.');
        }

        public function destroyCategory(CategoryBlog $category)
        {
            if ($category->blogs()->count() > 0) {
                return redirect()->route('admin.blog-management')->with('error', 'Cannot delete category with associated blogs.');
            }

            $category->delete();
            return redirect()->route('admin.blog-management')->with('success', 'Category deleted successfully.');
        }

        // Tag Methods
        public function storeTag(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255|unique:tags'
            ]);

            Tag::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);

            return redirect()->route('admin.blog-management')->with('success', 'Tag created successfully.');
        }

        // PERUBAHAN DI SINI: Ganti Tag $tag dengan $id
        public function updateTag(Request $request, $id)
        {
            \Log::info('Update Tag Request ID ' . $id . ':', $request->all());
            
            $tag = Tag::findOrFail($id);
            
            $request->validate([
                'name' => 'required|string|max:255|unique:tags,name,' . $tag->id
            ]);

            $tag->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);

            return redirect()->route('admin.blog-management')->with('success', 'Tag updated successfully.');
        }

        public function destroyTag(Tag $tag)
        {
            $tag->blogs()->detach();
            $tag->delete();
            return redirect()->route('admin.blog-management')->with('success', 'Tag deleted successfully.');
        }

        // Comment Methods
        public function destroyComment(Comment $comment)
        {
            $comment->delete();
            return redirect()->route('admin.blog-management')->with('success', 'Comment deleted successfully.');
        }
        
        // Di AdminController - getBlogData()
    public function getBlogData($id)
    {
        try {
            $blog = Blog::with('tags')->findOrFail($id);
            
            // DEBUG: Cek content langsung
            \Log::info('CONTENT DEBUG for ID ' . $id, [
                'content_raw' => $blog->content,
                'content_exists' => !empty($blog->content),
                'content_length' => strlen($blog->content ?? ''),
                'content_substr' => substr($blog->content ?? '', 0, 50)
            ]);
            
            return response()->json([
                'success' => true,
                'data' => [
                    'title' => $blog->title,
                    'slug' => $blog->slug,
                    'excerpt' => $blog->excerpt,
                    'content' => $blog->content ?? '', // PASTIKAN ini tidak null
                    'author' => $blog->author,
                    'category_id' => (string)$blog->category_id,
                    'is_published' => (bool)$blog->is_published,
                    'tags' => $blog->tags->pluck('id')->toArray(),
                    'image_url' => $blog->image ? asset('storage/' . $blog->image) : null
                ]
            ]);
            
        } catch (\Exception $e) {
            \Log::error('Error getting blog data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Blog not found'
            ], 404);
        }
    }
        
        public function getCategoryData($id)
    {
        try {
            $category = CategoryBlog::findOrFail($id);
            
            // Debug logging
            \Log::info('getCategoryData - ID: ' . $id . ', Name: ' . $category->name);
            
            return response()->json([
                'success' => true,
                'data' => [
                    'name' => $category->name,
                    'description' => $category->description
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('Error getting category data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Category not found'
            ], 404);
        }
    }

    public function getTagData($id)
    {
        try {
            $tag = Tag::findOrFail($id);
            
            // Debug logging
            \Log::info('getTagData - ID: ' . $id . ', Name: ' . $tag->name);
            
            return response()->json([
                'success' => true,
                'data' => [
                    'name' => $tag->name
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('Error getting tag data: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Tag not found'
            ], 404);
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
