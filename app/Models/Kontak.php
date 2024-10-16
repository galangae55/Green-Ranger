<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontak extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan penamaan konvensi
    protected $table = 'kontak';

    // Menentukan kolom yang dapat diisi massal
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
