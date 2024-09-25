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


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get("/donate", [GreenRangerController::class,"donate"]);
Route::get("/", [GreenRangerController::class,"homepage"]);
Route::get("/event", [GreenRangerController::class,"event"]);
Route::get("/blog", [GreenRangerController::class,"blog"]);
Route::get("/contact", [GreenRangerController::class,"contact"]);
Route::get("/belanja", [GreenRangerController::class,"belanja"]);
Route::get("/detail", [GreenRangerController::class,"detail"]);
Route::get("/admin", [GreenRangerController::class,"admin"]);
Route::post("/detail/komen/store", [KomenController::class,"store"]);
Route::post('/donate', [DonationController::class, 'store'])->name('donate.store');
// Auth
Route::middleware(['web'])->group(function () {
    Route::get('/auth', [AuthController::class, 'showAuthForm'])->name('auth');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('index'); // or your homepage view
    });
});
Route::get('/volunteer', function () {
    return view('volunteer');
});
Route::post('/volunteer', [VolunteerController::class, 'store'])->name('volunteer.store');
Route::get('/acara1', [AcaraController::class, 'acara1'])->name('acara1');
Route::get('/acara2', [AcaraController::class, 'acara2'])->name('acara2');
Route::get('/acara3', [AcaraController::class, 'acara3'])->name('acara3');
Route::get('/acara4', [AcaraController::class, 'acara4'])->name('acara4');


