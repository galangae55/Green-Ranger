<?php

use App\Models\Komen;
use Illuminate\Support\Facades\Route;

// Controllernya
use App\Http\Controllers\GreenRangerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\DaftarTransaksiController;
use App\Http\Controllers\BlogController;

// Middlewarenya
use App\Http\Middleware\CheckKesediaanKeranjang;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RestrictNonAdminAccess;
use App\Http\Middleware\LoginMiddleware;
use GuzzleHttp\Psr7\Uri;

// Rute yang hanya bisa diakses oleh admin
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin.dashboard'); // Menggunakan AdminController
    Route::get('/admin/roles', [GreenRangerController::class, 'adminRole'])->name('admin.roles'); // Route terpisah
    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/volunteer', [AdminController::class, 'adminVolunteer'])->name('admin.volunteer');
    Route::patch('/admin/volunteer/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::delete('/admin/volunteer/{id}', [AdminController::class, 'deleteVolunteer'])->name('admin.deleteVolunteer');
    Route::get('/admin/donation', [AdminController::class, 'adminDonation'])->name('admin.donation');
    Route::patch('/admin/donation/{id}/update-status', [AdminController::class, 'updateStatusDonasi'])->name('admin.updateStatusDonasi');
    Route::get('/admin/kontak', [AdminController::class, 'adminKontak'])->name('admin.kontak');
    Route::delete('/admin/kontak/{id}', [AdminController::class, 'deleteKontak'])->name('admin.deleteKontak');
    Route::get('/admin/belanja', [AdminController::class, 'adminBelanja'])->name('admin.belanja');
    Route::post('/admin/belanja/update/{id}', [AdminController::class, 'BelanjaUpdate'])->name('admin.updatepesanan');
    Route::get('/admin/akun', [AdminController::class, 'adminAkun'])->name('admin.akun');
    Route::delete('/admin/akun/{id}', [AdminController::class, 'deleteAkun'])->name('admin.deleteAkun');
    Route::patch('/admin/akun/{id}/update-status', [AdminController::class, 'updateRole'])->name('admin.updateRole');
});


// Rute yang hanya bisa diakses oleh non-admin (misalnya, pengguna umum)
Route::middleware([RestrictNonAdminAccess::class])->group(function () {
    Route::get("/", [GreenRangerController::class,"homepage"]);
    Route::get("/event", [GreenRangerController::class,"event"]);
    // Route::get("/blog", [GreenRangerController::class,"blog"]);
    // Blog Routes
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blog/category/{slug}', [BlogController::class, 'byCategory'])->name('blog.category');
    Route::get('/blog/tag/{slug}', [BlogController::class, 'byTag'])->name('blog.tag');
    Route::post('/blog/comment', [BlogController::class, 'storeComment'])->name('blog.comment.store');
    Route::get("/contact", [GreenRangerController::class,"contact"]);
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contacts.store');
    Route::post('/contact/storeNoLogin', [ContactController::class, 'storeNoLogin'])->name('contacts.storeNoLogin');
    Route::get("/belanja", [GreenRangerController::class,"belanja"])->name('belanja');
    Route::get("/detail", [GreenRangerController::class,"detail"]);
    Route::get("/detail2", [GreenRangerController::class,"detail2"]);
    Route::get("/detail3", [GreenRangerController::class,"detail3"]);
    Route::get("/detail4", [GreenRangerController::class,"detail4"]);
    Route::get("/detail5", [GreenRangerController::class,"detail5"]);
    Route::get("/detail6", [GreenRangerController::class,"detail6"]);
    Route::post("/detail/komen/store", [KomenController::class,"store"]);
    Route::get('/volunteer', function () {
        return view('volunteer');
    });
    Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer');
    Route::post('/volunteer', [VolunteerController::class, 'store'])->middleware('auth')->name('volunteer.store');
    Route::get('/event', [AcaraController::class, 'index'])->name('events.index');
    Route::get('/event/{slug}', [AcaraController::class, 'show'])->name('event.show');
    Route::get("/produk1", [GreenRangerController::class,"produk1"]);
    Route::get("/produk2", [GreenRangerController::class,"produk2"]);
    Route::get("/produk3", [GreenRangerController::class,"produk3"]);
    Route::get("/produk4", [GreenRangerController::class,"produk4"]);
    Route::get("/produk5", [GreenRangerController::class,"produk5"]);
    Route::get("/produk6", [GreenRangerController::class,"produk6"]);
    Route::get("/produk7", [GreenRangerController::class,"produk7"]);
    Route::get("/produk8", [GreenRangerController::class,"produk8"]);
    Route::get("/produk9", [GreenRangerController::class,"produk9"]);
    Route::get("/produk10", [GreenRangerController::class,"produk10"]);
    Route::get("/produk11", [GreenRangerController::class,"produk11"]);
    Route::get("/produk12", [GreenRangerController::class,"produk12"]);
    Route::post('/cart/add', [CartController::class, 'addToCart'])->middleware(LoginMiddleware::class)->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->middleware(LoginMiddleware::class)->name('cart.update.quantity');
    Route::get('/shop_cart', [CartController::class, 'showCart'])->middleware(LoginMiddleware::class)->name('cart.show');
    Route::delete('/shop_cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/shop_checkout', [CheckOutController::class, 'showOrderToCheckOut'])
    ->middleware([LoginMiddleware::class, CheckKesediaanKeranjang::class]);
    Route::post('/shop_checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');
    // Rute untuk menampilkan detail checkout
    Route::get('/checkout/detail/{id}', [CheckoutController::class, 'detail'])->name('checkout.detail');
    Route::post('/midtrans-callback', [CheckOutController::class, 'callback'])->name('midtrans.callback');
    Route::post('/checkout/update-status/{id}', [CheckOutController::class, 'updateStatus'])->name('checkout.updateStatus');
    Route::get("/daftar_transaksi", [DaftarTransaksiController::class,"showPesanan"])->middleware(LoginMiddleware::class);
    Route::post('/daftar_transaksi/update/{id}', [DaftarTransaksiController::class,'UpdatePesanan'])->name('update.pesanan')->middleware(LoginMiddleware::class);
});

// Auth routes
Route::middleware(['web'])->group(function () {
    Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/donate', [DonationController::class, 'showForm'])->name('donation.form');
Route::post('/donate/process', [DonationController::class, 'processForm'])->name('donation.process');
Route::get('/donate/detail', [DonationController::class, 'showDetail'])->name('donation.detail');
Route::post('/midtrans/callback', [DonationController::class, 'handleMidtransCallback'])->name('midtrans.callback');
Route::get('/donation/success', [DonationController::class, 'showSuccessPage'])->name('donation.success');
Route::post('/donation/update-status/{id}', [DonationController::class, 'updateStatus'])->name('donation.updateStatus');





