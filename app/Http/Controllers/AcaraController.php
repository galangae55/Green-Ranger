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
        $volunteers = Volunteer::where('event', 'Acara 1')->get();

        // Mengirim data ke view acara1.blade.php
        return view('acara1', ['volunteers' => $volunteers]);
    }

    public function acara2()
    {
        // Mengambil data acara1 dari tabel volunteer
        $volunteers = Volunteer::where('event', 'Acara 2')->get();

        // Mengirim data ke view acara1.blade.php
        return view('acara2', ['volunteers' => $volunteers]);
    }

    public function acara3()
    {
        // Mengambil data acara1 dari tabel volunteer
        $volunteers = Volunteer::where('event', 'Acara 3')->get();

        // Mengirim data ke view acara1.blade.php
        return view('acara3', ['volunteers' => $volunteers]);
    }
    public function acara4()
    {
        // Mengambil data acara1 dari tabel volunteer
        $volunteers = Volunteer::where('event', 'Acara 2')->get();

        // Mengirim data ke view acara1.blade.php
        return view('acara4', ['volunteers' => $volunteers]);
    }
}


