<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'group', 'value_ar', 'value_en'];

    protected static function booted()
    {
        static::saved(fn () => Cache::forget('site_settings_all'));
        static::deleted(fn () => Cache::forget('site_settings_all'));
    }

    protected static function allCached()
    {
        return Cache::rememberForever('site_settings_all', fn () => static::all()->keyBy('key'));
    }

    /**
     * Locale-aware value for a key. Falls back to the other language if empty.
     */
    public static function val(string $key, ?string $locale = null): string
    {
        $row = static::allCached()->get($key);
        if (! $row) {
            return '';
        }

        $locale = $locale ?? app()->getLocale();
        $fallback = $locale === 'ar' ? 'en' : 'ar';

        $value = $row->{"value_{$locale}"};

        return ($value !== null && $value !== '') ? $value : (string) $row->{"value_{$fallback}"};
    }

    /**
     * Non-localized value (urls, phone numbers, numbers, paths) — always value_ar.
     */
    public static function raw(string $key): string
    {
        $row = static::allCached()->get($key);

        return $row ? (string) $row->value_ar : '';
    }

    public static function set(string $key, ?string $valueAr, ?string $valueEn, ?string $group = null): void
    {
        static::updateOrCreate(['key' => $key], [
            'value_ar' => $valueAr,
            'value_en' => $valueEn,
            'group'    => $group,
        ]);
    }
}
