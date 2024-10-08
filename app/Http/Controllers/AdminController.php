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

    public function adminVolunteer()
    {
        $volunteers = Volunteer::all();

        return view('adminVolunteer', compact('volunteers'));
    }

    public function updateStatus($id)
    {
        // Cari volunteer berdasarkan id
        $volunteer = Volunteer::findOrFail($id);

        // Ubah status: jika status saat ini 'accepted', ubah menjadi 'pending', dan sebaliknya
        if ($volunteer->status == 'accepted') {
            $volunteer->status = 'pending';
        } else {
            $volunteer->status = 'accepted';
        }

        // Simpan perubahan
        $volunteer->save();

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'Status volunteer berhasil diubah.');
    }

    public function adminDonation()
    {
        return view('adminDonation');
    }

    public function deleteVolunteer($id)
    {
        // Cari volunteer berdasarkan id
        $volunteer = Volunteer::findOrFail($id);

        // Hapus volunteer
        $volunteer->delete();

        // Redirect kembali ke halaman volunteer dengan pesan sukses
        return redirect()->route('admin.volunteer')->with('success', 'Volunteer deleted successfully.');
    }


}
