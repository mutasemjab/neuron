<?php

return [
    'openai_key'  => env('OPENAI_API_KEY', ''),
    'model'       => env('OPENAI_MODEL', 'gpt-4o-mini'),
    'max_tokens'  => 400,
    'temperature' => 0.75,
    'history_limit' => 10, // messages per session
];
