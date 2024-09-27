<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function adminDashboard() {
        $totalAccounts = User::count(); // Menghitung jumlah akun
        return view('adminPage', compact('totalAccounts')); // Mengirim data ke view admin
    }
}
