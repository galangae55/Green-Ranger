<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Notification;
use Midtrans\Config;
use App\Models\Donation;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function showForm()
    {
        return view('donate');
    }

    public function processForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|digits:12',
            'email' => 'required|email',
            'amount' => 'required|integer|min:5000',
        ]);

        // Generate order_id unik
        $orderId = 'DON-' . time() . rand();

        // Buat donasi baru dengan status pending
        $donation = Donation::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'amount' => $request->input('amount'),
            'status' => 'pending',
            'order_id' => $orderId,
        ]);

        // Konfigurasi Snap Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ],
            'callbacks' => [
                'finish' => route('donation.success'), // URL untuk halaman sukses
                'unfinish' => route('donation.success'), // Jika pembayaran belum selesai
                'error' => route('donation.success'), // Jika ada kesalahan
                'notification' => 'https://d955-36-67-147-34.ngrok-free.app/midtrans/callback' // URL untuk callback
            ],
        ];
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('detailDonate', compact('donation','snapToken'));

        // try {
        //     $snapToken = Snap::getSnapToken($params);
        //     $redirectUrl = "https://app.sandbox.midtrans.com/snap/v4/redirection/" . $snapToken;

        //     // Simpan snap_token ke database jika diperlukan
        //     $donation->update(['snap_token' => $snapToken]);

        //     // Redirect pengguna ke halaman pembayaran Snap Midtrans
        //     return redirect()->away($redirectUrl);

        // } catch (\Exception $e) {
        //     return back()->with('error', 'Gagal mendapatkan SNAP_TOKEN: ' . $e->getMessage());
        // }
    }

    public function handleMidtransCallback(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;

        // Terima notifikasi dari Midtrans
        $notification = new Notification();
        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;

        // Temukan donasi berdasarkan order_id
        $donation = Donation::where('order_id', $orderId)->first();

        if ($donation) {
            DB::beginTransaction();
            try {
                // Perbarui status berdasarkan status transaksi dari Midtrans
                if ($transactionStatus == 'settlement') {
                    $donation->status = 'settlement';
                } elseif ($transactionStatus == 'pending') {
                    $donation->status = 'pending';
                } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                    $donation->status = 'failed';
                }

                $donation->save();
                DB::commit();

                \Log::info("Status donasi dengan Order ID {$orderId} berhasil diperbarui menjadi {$donation->status}");
            } catch (\Exception $e) {
                DB::rollBack();
                \Log::error("Gagal memperbarui status donasi: " . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal memperbarui status donasi'], 500);
            }
        } else {
            \Log::error("Donasi dengan Order ID {$orderId} tidak ditemukan.");
            return response()->json(['status' => 'error', 'message' => 'Donasi tidak ditemukan'], 404);
        }

        return response()->json(['status' => 'ok']);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $donation = Donation::findOrFail($id);
        $donation->status = $request->status;
        $donation->save();

        return response()->json(['success' => true, 'message' => 'Status berhasil diperbarui']);
    }


}
