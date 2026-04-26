<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'color',
        'body',
        'image',
        'tags',
        'published',
        'published_at',
    ];

    protected $casts = [
        'tags' => 'array',      // ← biar otomatis konversi ke JSON
        'published' => 'boolean',
        'published_at' => 'datetime',
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}