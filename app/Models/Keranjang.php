<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    
    public function checkouts()
    {
        return $this->belongsToMany(Checkout::class, 'checkout_keranjang', 'keranjang_id', 'check_out_id');
    }


}
