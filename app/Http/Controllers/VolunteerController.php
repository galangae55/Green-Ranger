<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'umur' => 'required|numeric',
            'email' => 'required|email',
            'no_telp' => 'required',
            'event' => 'required',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data volunteer
        $volunteer = new Volunteer();
        $volunteer->nama = $request->nama;
        $volunteer->umur = $request->umur;
        $volunteer->email = $request->email;
        $volunteer->no_telp = $request->no_telp;
        $volunteer->event = $request->event;
        $volunteer->save();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Anda telah berhasil menjadi volunteer!');
    }
}
