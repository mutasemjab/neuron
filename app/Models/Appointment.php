<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'phone_country_code', 'branch_id', 'doctor_id', 'booking_type',
        'preferred_date', 'preferred_time_slot', 'payment_method', 'visited_before',
        'notes', 'attachment', 'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'visited_before' => 'boolean',
    ];

    public function getAttachmentUrlAttribute(): ?string
    {
        return uploaded_image($this->attachment, 'appointments');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
