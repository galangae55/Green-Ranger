<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Tambahkan ini untuk menyimpan ID pengguna
        'username', // Tambahkan ini untuk menyimpan username
        'umur',
        'email',
        'no_telp',
        'event',
        'status', // Tambahkan ini untuk menyimpan status
    ];
}
