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
        // Ambil user_id dari pengguna yang sedang login
        $userId = auth()->id();

        // Cek apakah ada data di tabel keranjangs yang berstatus 'Belum Di Check Out' untuk user yang sedang login
        $keranjang = Keranjang::where('user_id', $userId)
            ->where('status', 'Belum Di Check Out')
            ->exists(); // Mengecek apakah ada data yang sesuai

        // Jika tidak ada, arahkan ke halaman tertentu atau tampilkan pesan error
        if (!$keranjang) {
            return redirect('shop_cart')->with('errorMid', 'Anda tidak memiliki Barang Unutk Di Cehck Out.');
        }

        // Jika ada, lanjutkan ke request berikutnya
        return $next($request);
    }
}
