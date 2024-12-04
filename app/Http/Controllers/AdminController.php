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

    public function deleteKontak($id)
    {
        // Cari volunteer berdasarkan id
        $kontak = kontak::findOrFail($id);

        // Hapus volunteer
        $kontak->delete();

        session()->flash('success', 'Data Kontak berhasil dihapus.');

        // Redirect kembali ke halaman volunteer dengan pesan sukses
        return redirect()->route('admin.kontak');
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

        $validated = $request->validate([
            'status' => 'required|string|in:Belum Dibayar,Sedang Diproses,Sedang Dikirim,Diterima,Gagal',
        ]);

        // Cari checkout berdasarkan ID
        $checkout = CheckOut::find($id);

        if ($checkout) {
            $checkout->update(['status' => $validated['status']]);
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Checkout tidak ditemukan.');
    }



}
