<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use Translatable;

    protected $fillable = [
        'title_ar', 'title_en', 'subtitle_ar', 'subtitle_en',
        'price', 'price_suffix_ar', 'price_suffix_en',
        'features_ar', 'features_en', 'badge_ar', 'badge_en',
        'button_text_ar', 'button_text_en',
        'is_featured', 'order_index', 'is_active',
    ];

    protected $casts = [
        'price'       => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = [
        'title', 'subtitle', 'price_suffix', 'features', 'badge', 'button_text',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function getFeaturesListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode("\n", (string) $this->features))));
    }
}
