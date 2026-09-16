<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use Translatable;

    protected $fillable = [
        'slug', 'title_ar', 'title_en', 'excerpt_ar', 'excerpt_en',
        'body_ar', 'body_en', 'category_ar', 'category_en', 'image',
        'read_minutes', 'meta_title_ar', 'meta_title_en',
        'meta_description_ar', 'meta_description_en', 'published_at', 'is_active',
        'show_body_images',
    ];

    protected $casts = [
        'is_active'         => 'boolean',
        'show_body_images'  => 'boolean',
        'read_minutes'      => 'integer',
        'published_at'      => 'datetime',
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

    /**
     * Plain-text excerpt for card/teaser contexts — the rich-text excerpt may contain
     * links/formatting that shouldn't be rendered raw inside a nested <a> card wrapper.
     */
    public function getExcerptPlainAttribute(): string
    {
        return Str::limit(trim(strip_tags((string) $this->excerpt)), 160);
    }

    /**
     * Article body HTML for the show page — with inline <img> tags stripped
     * when the admin has turned off "show images" for this article.
     */
    public function getBodyForDisplayAttribute(): string
    {
        $html = (string) $this->body;

        if (! $this->show_body_images) {
            $html = preg_replace('/<img\b[^>]*>/i', '', $html);
        }

        return $html;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
