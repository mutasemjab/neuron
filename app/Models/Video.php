<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use Translatable;

    protected $fillable = [
        'title_ar', 'title_en', 'tag_ar', 'tag_en',
        'thumbnail', 'video_url', 'is_main', 'order_index', 'is_active',
    ];

    protected $casts = [
        'is_main'     => 'boolean',
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['title', 'tag'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return uploaded_image($this->thumbnail, 'videos');
    }

    /**
     * YouTube embed URL, if video_url is a recognizable YouTube link — null otherwise
     * (caller falls back to opening video_url directly).
     */
    public function getEmbedUrlAttribute(): ?string
    {
        if (! $this->video_url) {
            return null;
        }

        if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|shorts\/))([A-Za-z0-9_-]{11})/', $this->video_url, $m)) {
            return "https://www.youtube.com/embed/{$m[1]}";
        }

        return null;
    }
}
