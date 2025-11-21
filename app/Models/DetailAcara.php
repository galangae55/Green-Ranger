<?php
// app/Models/DetailAcara.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAcara extends Model
{
    use HasFactory;

    protected $table = 'detail_acara';
    
    protected $fillable = [
        'event_id', 'schedule', 'gallery'
    ];

    protected $casts = [
        'schedule' => 'array',
        'gallery' => 'array'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}