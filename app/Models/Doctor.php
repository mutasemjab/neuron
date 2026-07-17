<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use Translatable;

    protected $fillable = [
        'name_ar', 'name_en', 'specialization_ar', 'specialization_en',
        'title_ar', 'title_en', 'bio_ar', 'bio_en',
        'certifications_ar', 'certifications_en', 'tags_ar', 'tags_en',
        'image', 'order_index', 'is_active',
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['name', 'specialization', 'title', 'bio', 'certifications', 'tags'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function getImageUrlAttribute(): ?string
    {
        return uploaded_image($this->image, 'doctors');
    }

    public function getCertificationsListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode("\n", (string) $this->certifications))));
    }

    public function getTagsListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', explode(',', (string) $this->tags))));
    }
}
