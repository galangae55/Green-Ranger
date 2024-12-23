<?php

namespace App\Http\Controllers;
use App\Models\Komen;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function store(Request $request){
        try {
            // Validasi input
            $request->validate([
                "nama"=> "required",
                "komentar"=> "required",
                "origin" => "required"
            ]);

            // Data yang akan disimpan
            $data = [
                'nama' => $request->nama,
                'komentar' => $request->komentar
            ];

            // Simpan ke database
            Komen::create($data);

            // Redirect kembali ke halaman asal
            $origin = $request->origin;
            return redirect('/' . $origin)->with('success', 'Komentar berhasil disimpan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Tangani jika validasi gagal
            return back()->withErrors($e->validator)->withInput()->with('error', 'Harap mengisi semua field yang diperlukan.');
        } catch (\Exception $e) {
            // Tangani jika terjadi error lain
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

}

