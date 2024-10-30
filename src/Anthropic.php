<?php

namespace JordanPartridge\Maestro;

use Saloon\Http\Connector;

class Anthropic extends Connector
{
    public function resolveBaseUrl(): string
    {
        return config('anthropic.base_url', 'https://api.anthropic.com/v1/');
    }

    public function defaultHeaders(): array
    {
        return [
            'x-api-key'         => config('anthropic.api_key'),
            'Content-Type'      => 'application/json',
            'anthropic-version' => '2023-06-01',
        ];
    }
}
