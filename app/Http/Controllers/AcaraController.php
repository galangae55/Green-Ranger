<?php

// app/Http/Controllers/AcaraController.php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function acara1()
    {
        // Mengambil data acara1 dari tabel volunteer
        $volunteers = Volunteer::where('status', 'accepted')
        ->where('event', 'Kenjeran Clean')
        ->get(['id', 'username', 'umur', 'event', 'created_at']);


        // Mengirim data ke view acara1.blade.php
        return view('acara1', ['volunteers' => $volunteers]);
    }

    public function acara2()
    {
        // Mengambil data acara1 dari tabel volunteer
        $volunteers = Volunteer::where('status', 'accepted')
        ->where('event', 'jaddih bersih')
        ->get(['id', 'username', 'umur', 'event', 'created_at']);

        // Mengirim data ke view acara1.blade.php
        return view('acara2', ['volunteers' => $volunteers]);
    }

    public function acara3()
    {
        // Mengambil data acara1 dari tabel volunteer
        $volunteers = Volunteer::where('status', 'accepted')
        ->where('event', 'Penyaluran Donasi')
        ->get(['id', 'username', 'umur', 'event', 'created_at']);

        // Mengirim data ke view acara1.blade.php
        return view('acara3', ['volunteers' => $volunteers]);
    }
    public function acara4()
    {
        // Mengambil data acara1 dari tabel volunteer
        $volunteers = Volunteer::where('status', 'accepted')
        ->where('event', 'Seminar Pelestarian Alam')
        ->get(['id', 'username', 'umur', 'event', 'created_at']);

        // Mengirim data ke view acara1.blade.php
        return view('acara4', ['volunteers' => $volunteers]);
    }
}


