<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{
    public function showAuthForm(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login, alihkan ke halaman yang diinginkan
            return redirect('/'); // Ganti dengan halaman yang sesuai
        }

        return view('auth.auth'); // Tampilkan formulir login
    }

    public function adminLogout(Request $request)
    {
        Auth::logout(); // Logout user

        // Hapus session dan redirect ke halaman login admin
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth')->with('logoutadming', 'Anda berhasil logout sebagai admin.');
    }

    public function showLoginForm(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            // Jika sudah login, alihkan ke halaman yang diinginkan
            return redirect('/'); // Ganti dengan halaman yang sesuai
        }

        return view('auth.login'); // Tampilkan formulir login
    }

    // REGISTER FUNCTION
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:users', // Validasi untuk name yang unik
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menciptakan user baru
        User::create([
            'name' => $validatedData['name'], // Menggunakan name sebagai username
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('auth')->with('success', 'Registrasi berhasil, silakan login.');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek peran (role) dari pengguna yang sudah login
            $user = Auth::user(); // Mendapatkan user yang sedang login

            // Simpan nama user di session
            session(['user_name' => $user->name]);

            if ($user->role === 'admin') {
                return redirect()->intended('/admin')->with('success', 'Anda telah berhasil login sebagai Admin, ' . $user->name);
            } elseif ($user->role === 'user') {
                return redirect()->intended('/')->with('success', 'Anda telah berhasil login sebagai User, ' . $user->name);
            }

            // Redirect default jika role tidak sesuai
            return redirect()->intended('/')->with('success', 'Login berhasil, ' . $user->name);
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ]);
    }

    // LOG OUT FUNCTION
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/?logout=success'); // Arahkan ke halaman utama dengan parameter query
    }

}
