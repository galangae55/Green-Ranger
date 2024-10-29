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
            'umur' => 'required|integer|min:12',
            'no_telp' => [
                'required',
                'string',
                'regex:/^[0-9]{12}$/'
            ],
            'event' => 'required|string',
        ]);

        Volunteer::create([
            'user_id' => Auth::id(),
            'username' => Auth::user()->name,
            'umur' => $request->umur,
            'no_telp' => $request->no_telp,
            'email' => Auth::user()->email,
            'event' => $request->event,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Data relawan berhasil disimpan');
    }


    public function DaftarVolunteer()
    {
        $volunteers = Volunteer::all(); // Mengambil semua data volunteer
        return view('adminPage', compact('volunteers'));
    }


}
