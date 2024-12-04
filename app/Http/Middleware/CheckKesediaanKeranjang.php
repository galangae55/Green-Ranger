<?php

namespace App\Http\Middleware;

use App\Models\Keranjang;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckKesediaanKeranjang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (auth()->check()) {
            $userId = auth()->id(); // Ambil ID user yang sedang login

            // Periksa apakah ada keranjang dengan status 'Belum Di Check Out'
            $exists = Keranjang::where('user_id', $userId)
                ->whereHas('checkouts', function ($query) {
                    $query->where('status', 'Belum Di Check Out');
                })
                ->exists();

            // Jika tidak ada data, kembalikan respons dengan pesan
            if (!$exists) {
                return redirect('belanja')->with('error', 'Anda tidak memiliki Barang Unutk Di Cehck Out.');
                // return redirect()->back()->with('error', 'Anda tidak memiliki Barang Unutk Di Cehck Out.');
            }
        }

        return $next($request);
    }
}
