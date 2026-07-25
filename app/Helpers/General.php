<?php

/**
 * Get a site setting value, locale-aware.
 * For URLs / numbers / paths, locale is ignored (returns value_ar).
 */
function sett(string $key, ?string $locale = null): string
{
    return \App\Models\SiteSetting::val($key, $locale);
}

/**
 * Get raw (non-localized) site setting value — for URLs, paths, numbers.
 */
function sett_raw(string $key): string
{
    return \App\Models\SiteSetting::raw($key);
}

function uploadImage($folder, $image)
{
    $extension = strtolower($image->getClientOriginalExtension());

    // generate unique name with timestamp + random string
    $filename = uniqid() . '_' . time() . '.' . $extension;

    $image->move(base_path($folder), $filename);

    return $filename;
}



function uploadFile($file, $folder)
{
    $path = $file->store($folder);
    return $path;
}

/**
 * Build a public URL for a file uploaded via uploadImage('assets/uploads/{folder}', ...).
 * Pass just the stored filename and the bare module folder name, e.g.:
 *   uploaded_image($doctor->image, 'doctors')
 */
function uploaded_image(?string $filename, string $folder): ?string
{
    return $filename ? asset("assets/uploads/{$folder}/{$filename}") : null;
}

/**
 * asset() with a cache-busting ?v= query string based on the file's last-modified
 * time, so browsers fetch a fresh copy automatically whenever the file on disk
 * changes — without needing a manual hard refresh / cache clear.
 */
function asset_v(string $path): string
{
    $full = base_path($path);
    $version = file_exists($full) ? filemtime($full) : time();

    return asset($path) . '?v=' . $version;
}




