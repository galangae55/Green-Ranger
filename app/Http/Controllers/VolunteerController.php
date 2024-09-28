<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    // FUNGSI UNTUK MEMASUKKAN KE DATABASE
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'umur' => 'required|integer',
            'no_telp' => 'required|string',
            'event' => 'required|string',
        ]);

        Volunteer::create([
            'user_id' => Auth::id(), // Menyimpan ID pengguna yang login
            'username' => Auth::user()->name, // Menyimpan username dari pengguna yang login
            'umur' => $request->umur,
            'no_telp' => $request->no_telp,
            'email' => Auth::user()->email, // Menyimpan email dari pengguna yang login
            'event' => $request->event,
            'status' => 'pending', // Set status default ke 'pending'
        ]);

        return redirect()->back()->with('success', 'Data relawan berhasil disimpan');
    }

    public function DaftarVolunteer()
    {
        $volunteers = Volunteer::all(); // Mengambil semua data volunteer
        return view('adminPage', compact('volunteers'));
    }


}
