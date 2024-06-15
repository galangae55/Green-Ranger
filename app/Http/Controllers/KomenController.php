<?php

namespace App\Http\Controllers;
use App\Models\Komen;
use Illuminate\Http\Request;

class KomenController extends Controller
{
    public function store(Request $request){
        $request->validate([
            "nama"=> "required",
            "komentar"=> "required",
            "origin" => "required"
        ]);

        $data = [
            'nama' => $request->nama,
            'komentar' => $request->komentar
        ];

        Komen::create($data);

        // Redirect back to the original page
        $origin = $request->origin;
        return redirect('/' . $origin);
    }
}

