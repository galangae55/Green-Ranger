<?php

namespace App\Http\Controllers;

use App\Models\CheckOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Keranjang;
use App\Models\MetodePengiriman;
use App\Models\User;

class CheckOutController extends Controller
{
    public function showOrderToCheckOut()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login

        // Hanya ambil barang dengan status 'Belum Di Check Out'
        $keranjangs = Keranjang::where('user_id', $userId)
            ->where('status', 'Belum Di Check Out') // Hanya yang statusnya 'Belum Di Check Out'
            ->with('product') // Ambil relasi produk
            ->get();

        // Hitung subtotal dari barang yang ada di keranjang
        $subtotal = $keranjangs->sum(function ($keranjang) {
            return $keranjang->product->price * $keranjang->quantity;
        });

        // Ambil semua metode pengiriman
        $metode_pengiriman = MetodePengiriman::all();

        return view('check_out', [
            'keranjangs' => $keranjangs,
            'subtotal' => $subtotal,
            'metode_pengiriman' => $metode_pengiriman
        ]);
    }



    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'billing_address_1' => 'required|string',
            'billing_city' => 'required|string',
            'billing_postcode' => 'required|string',
            'billing_phone' => 'required|string',
            'metode_pengiriman_id' => 'required|integer',
            'order_comments' => 'nullable|string',
            'billing_address_2' => 'nullable|string',
        ]);

        // Ambil ID user yang sedang login
        $userId = auth()->id();

        // Ambil data keranjang milik user yang belum di checkout
        $keranjangs = Keranjang::where('user_id', $userId)
            ->where('status', 'Belum Di Check Out')
            ->get();

        // Hitung subtotal (harga seluruh barang yang di-checkout)
        $subtotal = $keranjangs->sum(function ($keranjang) {
            return $keranjang->product->price * $keranjang->quantity;
        });

        // Ambil data biaya pengiriman berdasarkan pilihan metode pengiriman
        $metodePengiriman = MetodePengiriman::find($validatedData['metode_pengiriman_id']);
        $shippingCost = $metodePengiriman->price;

        // Hitung total_akhir (subtotal + biaya pengiriman)
        $totalAkhir = $subtotal + $shippingCost;
        Log::info('Total Akhir: ' . $totalAkhir);
        // Buat data checkout
        $checkout = CheckOut::create([
            'user_id' => $userId,
            'metode_pengiriman_id' => $validatedData['metode_pengiriman_id'],
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'billing_address_1' => $validatedData['billing_address_1'],
            'billing_address_2' => $validatedData['billing_address_2'] ?? null,
            'billing_city' => $validatedData['billing_city'],
            'billing_postcode' => $validatedData['billing_postcode'],
            'billing_phone' => $validatedData['billing_phone'],
            'subtotal' => $subtotal,  // Harga seluruh barang
            'total_akhir' => $totalAkhir, // Total harga akhir (subtotal + biaya pengiriman)
            'status' => 'Belum Dibayar', // Status default
            'order_comments' => $validatedData['order_comments'],
        ]);

        // Menyimpan relasi checkout dan keranjang (many-to-many)
        $checkout->keranjangs()->attach($keranjangs->pluck('id'));

        // Update status keranjang menjadi 'Check Out'
        Keranjang::whereIn('id', $keranjangs->pluck('id'))->update(['status' => 'Check Out']);

         // Redirect ke halaman detail checkout dengan ID checkout
         return redirect()->route('checkout.detail', ['id' => $checkout->id])->with('success', 'Checkout berhasil dilakukan!');
        }

        // Menampilkan detail checkout
        public function detail($id)
        {
            $checkout = CheckOut::findOrFail($id);
            $totalAkhir = $checkout->total_akhir;
            $first_name = $checkout->first_name;
            $last_name = $checkout->last_name;
            $billing_phone = $checkout->billing_phone;

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                //  // (Opsional) Tambahkan item details untuk pelacakan yang lebih baik
                // 'item_details' => $checkout->keranjangs->map(function($keranjang) {
                //     return [
                //         'id' => $keranjang->product->id,
                //         'price' => $keranjang->product->price,
                //         'quantity' => $keranjang->quantity,
                //         'name' => $keranjang->product->name,

                //     ];
                // })->toArray(),

                'transaction_details' => array(
                    'order_id' => 'ORDER-' . $checkout->id,
                    'gross_amount' => $checkout->total_akhir,
                ),
                'customer_details' => array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'phone' => $billing_phone,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);


            return view('detail_checkout', compact('checkout','snapToken'));

        }

        public function callback(request $request){
            $serverKey = config('midtrans.server_key');
            $hashed = hash("sha512",$request->order_id, $request->status_code,$request->gross_amount.$serverKey);
            if($hashed == $request->signature_key){
                if($request->transaction_status == 'capture'){
                    $checkout = CheckOut::findOrFail($request->order_id);
                    $checkout->status = 'Sedang Diproses';
                }
            }
        }

}
