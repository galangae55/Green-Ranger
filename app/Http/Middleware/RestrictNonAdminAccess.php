<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RestrictNonAdminAccess
{
    public function handle($request, Closure $next)
    {
        // Jika user adalah admin dan mencoba mengakses halaman selain /admin
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/admin')->with('error', 'Admin hanya bisa mengakses halaman admin.');
        }

        return $next($request); // Lanjutkan jika bukan admin
    }
}
