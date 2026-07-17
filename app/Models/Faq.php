<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Translatable;

    protected $fillable = ['question_ar', 'question_en', 'answer_ar', 'answer_en', 'order_index', 'is_active'];

    protected $casts = [
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['question', 'answer'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }
}
