<?php

use App\Models\Komen;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreenRangerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\RestrictNonAdminAccess;

// Rute yang hanya bisa diakses oleh admin
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin.dashboard'); // Menggunakan AdminController
    Route::get('/admin/roles', [GreenRangerController::class, 'adminRole'])->name('admin.roles'); // Route terpisah
    Route::post('/admin/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');
    Route::get('/admin/volunteer', [AdminController::class, 'adminVolunteer'])->name('admin.volunteer');
    Route::patch('/admin/volunteer/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::delete('/admin/volunteer/{id}', [AdminController::class, 'deleteVolunteer'])->name('admin.deleteVolunteer');
    Route::get('/admin/donation', [AdminController::class, 'adminDonation'])->name('admin.donation');

});


// Rute yang hanya bisa diakses oleh non-admin (misalnya, pengguna umum)
Route::middleware([RestrictNonAdminAccess::class])->group(function () {
    Route::get("/donate", [GreenRangerController::class,"donate"]);
    Route::get("/", [GreenRangerController::class,"homepage"]);
    Route::get("/event", [GreenRangerController::class,"event"]);
    Route::get("/blog", [GreenRangerController::class,"blog"]);
    Route::get("/contact", [GreenRangerController::class,"contact"]);
    Route::get("/belanja", [GreenRangerController::class,"belanja"]);
    Route::get("/detail", [GreenRangerController::class,"detail"]);
    Route::post("/detail/komen/store", [KomenController::class,"store"]);
    Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
    Route::get('/volunteer', function () {
        return view('volunteer');
    });
    Route::post('/volunteer', [VolunteerController::class, 'store'])->middleware('auth')->name('volunteer.store');
    Route::get('/acara1', [AcaraController::class, 'acara1'])->name('acara1');
    Route::get('/acara2', [AcaraController::class, 'acara2'])->name('acara2');
    Route::get('/acara3', [AcaraController::class, 'acara3'])->name('acara3');
    Route::get('/acara4', [AcaraController::class, 'acara4'])->name('acara4');
    Route::get("/shop_cart", [GreenRangerController::class,"shop_cart"]);
    Route::get("/shop_single", [GreenRangerController::class,"shop_single"]);
    Route::get("/shop_checkout", [GreenRangerController::class,"shop_checkout"]);
});

// Auth routes
Route::middleware(['web'])->group(function () {
    Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
