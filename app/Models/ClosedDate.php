<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClosedDate extends Model
{
    protected $fillable = ['date', 'label_ar', 'label_en'];

    protected $casts = [
        'date' => 'date:Y-m-d',
    ];
}
