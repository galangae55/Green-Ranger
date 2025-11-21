<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Tambahkan ini

    protected $fillable = ['name', 'slug', 'description'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id'); // pastikan foreign key benar
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
