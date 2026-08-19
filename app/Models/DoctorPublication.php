<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPublication extends Model
{
    protected $fillable = ['doctor_id', 'title_ar', 'title_en', 'year', 'url', 'order_index'];

    protected $casts = [
        'year'        => 'integer',
        'order_index' => 'integer',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
