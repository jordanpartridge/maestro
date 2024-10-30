<?php

// config for Jordan Partridge/Maestro
return [

    'anthropic' => [
        'api_key' => env('ANTHROPIC_API_KEY'),
        'base_url' => env('ANTHROPIC_BASE_URL', 'https://api.anthropic.com/v1/'),
    ]
];
