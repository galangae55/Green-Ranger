<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            // Simpan data kontak dengan user_id, username, dan email
            kontak::create([
                'name' => auth()->user()->name, // Ambil username dari pengguna yang login
                'email' => auth()->user()->email, // Ambil email dari pengguna yang login
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Redirect ke halaman sebelumnya dengan notifikasi sukses
            return redirect()->back()->with('success', 'Pesan berhasil dikirim! Pesan anda sangat berarti bagi kami, Terima Kasih');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada pengisihan form, silakan coba lagi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada pengisihan form, silakan coba lagi.');
        }
    }

    public function storeNologin(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);

            // Simpan data kontak tanpa bergantung pada auth()->user()
            kontak::create([
                'name' => $request->input('name'), // Ambil username dari input form
                'email' => $request->input('email'),   // Ambil email dari input form
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ]);

            // Redirect ke halaman sebelumnya dengan notifikasi sukses
            return redirect()->back()->with('success', 'Pesan berhasil dikirim! Pesan anda sangat berarti bagi kami, Terima Kasih');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada pengisihan form, silakan coba lagi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan pada pengisihan form, silakan coba lagi.');
        }
    }

}
