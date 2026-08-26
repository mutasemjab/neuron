<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'career_job_id', 'branch_id', 'name', 'phone', 'email', 'cv', 'message', 'status',
    ];

    public function careerJob()
    {
        return $this->belongsTo(CareerJob::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getCvUrlAttribute(): ?string
    {
        return uploaded_image($this->cv, 'job_applications');
    }
}
