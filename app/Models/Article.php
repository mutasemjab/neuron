<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Translatable;

    protected $fillable = [
        'slug', 'title_ar', 'title_en', 'excerpt_ar', 'excerpt_en',
        'body_ar', 'body_en', 'category_ar', 'category_en', 'image',
        'read_minutes', 'meta_title_ar', 'meta_title_en',
        'meta_description_ar', 'meta_description_en', 'published_at', 'is_active',
    ];

    protected $casts = [
        'is_active'    => 'boolean',
        'read_minutes' => 'integer',
        'published_at' => 'datetime',
    ];

    protected array $translatable = [
        'title', 'excerpt', 'body', 'category', 'meta_title', 'meta_description',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at');
    }

    public function getImageUrlAttribute(): ?string
    {
        return uploaded_image($this->image, 'articles');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
