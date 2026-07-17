<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class CareerJob extends Model
{
    use Translatable;

    protected $table = 'career_jobs';

    protected $fillable = [
        'title_ar', 'title_en', 'type_ar', 'type_en',
        'description_ar', 'description_en', 'location_ar', 'location_en',
        'order_index', 'is_active',
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['title', 'type', 'description', 'location'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }
}
