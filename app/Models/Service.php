<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable;

    protected $fillable = [
        'title_ar', 'title_en', 'description_ar', 'description_en',
        'image', 'is_featured', 'order_index', 'is_active',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['title', 'description'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function getImageUrlAttribute(): ?string
    {
        return uploaded_image($this->image, 'services');
    }
}
