<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatbotKnowledge extends Model
{
    protected $table = 'chatbot_knowledge';

    protected $fillable = [
        'category', 'title_ar', 'title_en',
        'content_ar', 'content_en', 'tags',
        'is_active', 'order_index',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeSearch($query, string $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('title_ar', 'LIKE', "%{$term}%")
              ->orWhere('title_en', 'LIKE', "%{$term}%")
              ->orWhere('content_ar', 'LIKE', "%{$term}%")
              ->orWhere('content_en', 'LIKE', "%{$term}%")
              ->orWhere('tags', 'LIKE', "%{$term}%");
        });
    }
}
