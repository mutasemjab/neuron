<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use Translatable;

    protected $fillable = [
        'name_ar', 'name_en', 'badge_ar', 'badge_en',
        'address_ar', 'address_en', 'working_hours_ar', 'working_hours_en',
        'phone', 'map_query', 'is_main', 'order_index', 'is_active',
    ];

    protected $casts = [
        'is_main'     => 'boolean',
        'is_active'   => 'boolean',
        'order_index' => 'integer',
    ];

    protected array $translatable = ['name', 'badge', 'address', 'working_hours'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
