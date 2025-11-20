<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'description', 'discount_price'];
    // category dihapus dari fillable

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}