<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'name', 'phone', 'branch_id', 'doctor_id', 'booking_type',
        'preferred_date', 'preferred_time_slot', 'notes', 'attachment', 'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
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
