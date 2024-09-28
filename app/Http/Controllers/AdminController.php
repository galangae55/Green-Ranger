<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Volunteer;

class AdminController extends Controller
{
    // FUNGSI UNTUK MENAMPILKAN JUMLAH DATA YANG ADA PADA TABEL USER
    public function adminDashboard()
    {
        // Fungsiong Menghitung jumlah data
        $totalAccounts = User::count();
        $totalVolunteer = Volunteer::count();

        // Mengambil semua data volunteer dari database
        $volunteers = Volunteer::all();

        // Mengirim data ke view admin
        return view('adminPage', compact('totalAccounts', 'volunteers','totalVolunteer'));
    }

}
