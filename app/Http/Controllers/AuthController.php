<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{
    public function showAuthForm()
    {
        return view('auth.auth');
    }

    // REGISTER FUNCTION
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Set role default ke 'user'
        ]);

        // Redirect ke halaman / dengan notifikasi
        return Redirect::to('/auth')->with('success', 'User registered successfully');
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
                return redirect()->intended('/#')->with('success', 'Anda telah berhasil login sebagai User, ' . $user->name);
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
