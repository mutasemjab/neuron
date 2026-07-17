<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use Translatable;

    protected $fillable = ['section', 'number', 'suffix', 'label_ar', 'label_en', 'order_index', 'is_active'];

    protected $casts = [
        'number'      => 'integer',
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['label'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function scopeSection($query, string $section)
    {
        return $query->where('section', $section);
    }
}
