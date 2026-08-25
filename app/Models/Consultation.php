<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'name', 'email', 'phone_country_code', 'phone',
        'country_of_residence', 'date_of_birth',
        'preferred_days', 'preferred_periods', 'condition_description',
        'attachments', 'privacy_consent', 'status',
    ];

    protected $casts = [
        'date_of_birth'    => 'date:Y-m-d',
        'preferred_days'   => 'array',
        'preferred_periods'=> 'array',
        'attachments'      => 'array',
        'privacy_consent'  => 'boolean',
    ];

    public function getAttachmentUrlsAttribute(): array
    {
        return collect($this->attachments ?? [])
            ->map(fn ($file) => uploaded_image($file, 'consultations'))
            ->filter()
            ->values()
            ->all();
    }

    public static function dayLabels(): array
    {
        return [
            'sunday'    => ['ar' => 'الأحد', 'en' => 'Sunday'],
            'monday'    => ['ar' => 'الاثنين', 'en' => 'Monday'],
            'tuesday'   => ['ar' => 'الثلاثاء', 'en' => 'Tuesday'],
            'thursday'  => ['ar' => 'الخميس', 'en' => 'Thursday'],
        ];
    }

    public static function periodLabels(): array
    {
        return [
            'morning'   => ['ar' => 'صباحًا', 'en' => 'Morning'],
            'afternoon' => ['ar' => 'ظهرًا', 'en' => 'Afternoon'],
        ];
    }

    public function getPreferredDaysLabelAttribute(): string
    {
        $labels = self::dayLabels();

        return collect($this->preferred_days ?? [])
            ->map(fn ($d) => $labels[$d]['ar'] ?? $d)
            ->implode('، ');
    }

    public function getPreferredPeriodsLabelAttribute(): string
    {
        $labels = self::periodLabels();

        return collect($this->preferred_periods ?? [])
            ->map(fn ($p) => $labels[$p]['ar'] ?? $p)
            ->implode('، ');
    }
}
