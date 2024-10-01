<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Lanjutkan request jika admin
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
