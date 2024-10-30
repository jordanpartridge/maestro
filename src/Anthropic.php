<?php

namespace JordanPartridge\Maestro;

use InvalidArgumentException;
use Saloon\Http\Connector;

class Anthropic extends Connector
{
    private const API_VERSION = '2023-06-01';

    public function resolveBaseUrl(): string
    {
        return config('anthropic.base_url', 'https://api.anthropic.com/v1/');
    }

    /**
     * The default headers for every request made by the connector.
     *
     * @return array<string, string>
     *
     * @throws InvalidArgumentException if Anthropic API key is not set
     */
    public function defaultHeaders(): array
    {
        $api_key = config('anthropic.api_key');

        if (! $api_key) {
            throw new InvalidArgumentException('Anthropic API key not set');
        }

        return [
            'x-api-key' => $api_key,
            'Content-Type' => 'application/json',
            'anthropic-version' => self::API_VERSION,
        ];
    }
}
