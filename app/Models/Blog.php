<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'author',
        'comment_count',
        'is_published',
        'category_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = \Str::slug($blog->title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relationship dengan komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relationship dengan category
    public function category()
    {
        return $this->belongsTo(CategoryBlog::class, 'category_id'); // Ganti dari Category ke CategoryBlog
    }

    // Relationship dengan tags (many-to-many)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Scope untuk artikel terbaru
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    // Scope untuk artikel published
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // Method untuk related posts berdasarkan tags
    public function getRelatedPosts($limit = 3)
    {
        // Jika ada tags, cari post dengan tag yang sama
        if ($this->tags->isNotEmpty()) {
            $tagIds = $this->tags->pluck('id');

            $related = Blog::published()
                ->where('id', '!=', $this->id)
                ->whereHas('tags', function($query) use ($tagIds) {
                    $query->whereIn('tags.id', $tagIds);
                })
                ->latest()
                ->limit($limit)
                ->get();

            // Jika tidak cukup post dengan tag yang sama, tambahkan post terbaru
            if ($related->count() < $limit) {
                $additionalNeeded = $limit - $related->count();
                $additional = Blog::published()
                    ->where('id', '!=', $this->id)
                    ->whereNotIn('id', $related->pluck('id'))
                    ->latest()
                    ->limit($additionalNeeded)
                    ->get();

                $related = $related->merge($additional);
            }

            return $related;
        }

        // Jika tidak ada tags, return post terbaru
        return Blog::published()
            ->where('id', '!=', $this->id)
            ->latest()
            ->limit($limit)
            ->get();
    }
}
