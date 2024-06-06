<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreenRangerController;
use App\Http\Controllers\ContactController;


Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Route::get('/', function () {
//     return view('index');
// });


Route::get("/", [GreenRangerController::class,"homepage"]);
Route::get("/donate", [GreenRangerController::class,"donate"]);
Route::get("/event", [GreenRangerController::class,"event"]);
Route::get("/blog", [GreenRangerController::class,"blog"]);
Route::get("/contact", [GreenRangerController::class,"contact"]);
Route::get("/detail", [GreenRangerController::class,"detail"]);
Route::get("/volunteer", [GreenRangerController::class,"volunteer"]);
Route::get("/login", [GreenRangerController::class,"login"]);



