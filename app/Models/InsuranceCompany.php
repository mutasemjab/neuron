<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class InsuranceCompany extends Model
{
    use Translatable;

    protected $fillable = ['name_ar', 'name_en', 'subtitle_ar', 'subtitle_en', 'order_index', 'is_active'];

    protected $casts = [
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['name', 'subtitle'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }
}
