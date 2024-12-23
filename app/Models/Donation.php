<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'name',
        'phone',
        'email',
        'amount',
        'status', // Pastikan kolom status ada di sini
        'order_id', // Jika kamu menggunakan order_id
    ];
    const STATUS_PENDING = 'pending';
    const STATUS_DONE = 'done';
    const STATUS_FAILED = 'failed';
}
