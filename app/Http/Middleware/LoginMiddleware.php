<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // Jika pengguna belum login, kembalikan ke halaman sebelumnya dengan notifikasi
            return redirect()->back()->with('error', 'Anda harus login terlebih dahulu.');
        }

        return $next($request);
    }
}
