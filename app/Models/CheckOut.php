<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'keranjang_id', 'metode_pengiriman_id', 'first_name', 'last_name',
        'billing_address_1', 'billing_address_2', 'billing_city', 'billing_postcode',
        'billing_phone', 'total_harga', 'status', 'order_comments'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }

    public function metodePengiriman()
    {
        return $this->belongsTo(MetodePengiriman::class);
    }
}
