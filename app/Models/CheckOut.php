<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 'checkouts'; // Nama tabel di database

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'user_id',
        'metode_pengiriman_id',
        'first_name',
        'last_name',
        'billing_address_1',
        'billing_address_2',
        'billing_city',
        'billing_postcode',
        'billing_phone',
        'subtotal',       // Harga total barang
        'total_akhir',    // Total harga setelah ditambah biaya pengiriman
        'status',         // Status checkout
        'order_comments', // Komentar order
    ];

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel MetodePengiriman
    public function metode_pengiriman()
    {
        return $this->belongsTo(MetodePengiriman::class, 'metode_pengiriman_id');
    }


    // Scope untuk mengambil data checkout berdasarkan user yang login
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // App\Models\Checkout.php

    public function keranjangs()
    {
        return $this->belongsToMany(Keranjang::class, 'checkout_keranjang', 'check_out_id', 'keranjang_id');
    }

}
