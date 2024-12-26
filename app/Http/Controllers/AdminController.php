<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use App\Models\Donation;
use App\Models\Keranjang;
use App\Models\kontak;
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

        // Menghitung total donasi dengan status 'accepted'
        $totalDonations = Donation::where('status', 'accepted')->sum('amount');

        // Mengambil semua data volunteer dan kontak dari database
        $volunteers = Volunteer::all();
        $kontaks = kontak::all();

        // Mengirim data ke view admin
        return view('adminPage', compact('totalAccounts', 'volunteers', 'totalVolunteer', 'kontaks', 'totalDonations'));
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
    public function updateStatusDonasi($id)
    {
        // Cari volunteer berdasarkan id
        $donationsss = Donation::findOrFail($id);

        // Ubah status: jika status saat ini 'accepted', ubah menjadi 'pending', dan sebaliknya
        if ($donationsss->status == 'accepted') {
            $donationsss->status = 'pending';
        } else {
            $donationsss->status = 'accepted';
        }

        // Simpan perubahan
        $donationsss->save();

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('successking', 'Status Donasi berhasil diubah.');
    }


    public function deleteVolunteer($id)
    {
        // Cari volunteer berdasarkan id
        $volunteer = Volunteer::findOrFail($id);

        // Hapus volunteer
        $volunteer->delete();

        // Notifikasi ketika berhasil terhapus
        session()->flash('success', 'Data volunteer berhasil dihapus.');

        // Redirect kembali ke halaman volunteer dengan pesan sukses
        return redirect()->route('admin.volunteer');
    }

    public function deleteKontak($id)
    {
        // Cari volunteer berdasarkan id
        $kontaks = kontak::findOrFail($id);

        // Hapus volunteer
        $kontaks->delete();

        return redirect()->route('admin.kontak')->with('success', 'Kontak berhasil dihapus!');
    }



    public function adminDonation()
    {
        $donationsss = Donation::all();

        return view('adminDonation', compact('donationsss'));
    }

    public function adminKontak()
    {
        $kontak = kontak::all();

        return view('adminKontak', compact('kontak'));
    }



    public function adminBelanja()
    {
        // Ambil barang berdasarkan status di checkouts
        $products = Keranjang::with(['product'])
            ->get();

        return view('adminBelanja', compact('products')); // Menggunakan view daftarTransaksi
    }

    public function BelanjaUpdate(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'status' => 'required|string|in:Belum Dibayar,Sedang Diproses,Sedang Dikirim,Diterima,Gagal',
        ]);

        // Cari checkout berdasarkan ID
        $checkout = CheckOut::find($id);

        if ($checkout) {
            $checkout->update(['status' => $validated['status']]);

            // Jika request dari Fetch API, kembalikan respons JSON
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Status berhasil diperbarui.',
                ]);
            }

            // Jika request biasa, redirect dengan flash message
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        }

        // Jika tidak ditemukan, kembalikan error sesuai jenis request
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Checkout tidak ditemukan.',
            ], 404);
        }

        return redirect()->back()->with('error', 'Checkout tidak ditemukan.');
    }


    public function adminAkun()
    {
        // Ambil barang berdasarkan status di checkouts
        $users = User::all();

        return view('adminAkun', compact('users')); // Menggunakan view daftarTransaksi
    }

    public function deleteAkun($id)
    {
        // Cari volunteer berdasarkan id
        $users = User::findOrFail($id);

        // Hapus volunteer
        $users->delete();

        // Notifikasi ketika berhasil terhapus
        session()->flash('success', 'Data akun berhasil dihapus.');

        // Redirect kembali ke halaman volunteer dengan pesan sukses
        return redirect()->route('admin.akun');
    }

    public function updateRole($id)
    {
        // Cari volunteer berdasarkan id
        $users = User::findOrFail($id);

        // Ubah status: jika status saat ini 'accepted', ubah menjadi 'pending', dan sebaliknya
        if ($users->role == 'admin') {
            $users->role = 'user';
        } else {
            $users->role = 'admin';
        }

        // Simpan perubahan
        $users->save();

        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'Role berhasil diubah.');
    }

}
