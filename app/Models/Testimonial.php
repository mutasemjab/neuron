<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use Translatable;

    protected $fillable = [
        'patient_name_ar', 'patient_name_en', 'role_text_ar', 'role_text_en',
        'quote_ar', 'quote_en', 'rating', 'avatar', 'doctor_id',
        'procedure_ar', 'procedure_en', 'order_index', 'is_active',
    ];

    protected $casts = [
        'is_active'   => 'boolean',
        'order_index' => 'integer',
        'rating'      => 'integer',
    ];

    protected array $translatable = ['patient_name', 'role_text', 'quote', 'procedure'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function getAvatarUrlAttribute(): ?string
    {
        return uploaded_image($this->avatar, 'testimonials');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
