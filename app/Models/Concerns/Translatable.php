<?php

namespace App\Models\Concerns;

/**
 * Give a model locale-aware access to fields stored as {field}_ar / {field}_en.
 * $model->title resolves to title_ar or title_en depending on app()->getLocale(),
 * falling back to the other language if the current locale's value is empty.
 *
 * Models using this trait must define: protected array $translatable = ['title', ...];
 */
trait Translatable
{
    public function getAttribute($key)
    {
        if (in_array($key, $this->translatable ?? [], true)) {
            $locale = app()->getLocale();
            $fallback = $locale === 'ar' ? 'en' : 'ar';

            $value = parent::getAttribute("{$key}_{$locale}");

            return ($value !== null && $value !== '')
                ? $value
                : parent::getAttribute("{$key}_{$fallback}");
        }

        return parent::getAttribute($key);
    }
}
