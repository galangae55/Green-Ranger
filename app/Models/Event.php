<?php

// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'description', 'image', 'date', 'time', 'location'
    ];

    // Relasi ke detail_acara
    public function detail()
    {
        return $this->hasOne(DetailAcara::class);
    }

    // Relasi ke volunteers
    public function volunteers()
    {
        return $this->hasMany(Volunteer::class, 'event', 'title');
    }
}
