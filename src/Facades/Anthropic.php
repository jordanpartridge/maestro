<?php

namespace JordanPartridge\Maestro\Facades;

use Illuminate\Support\Facades\Facade;
use JordanPartridge\Maestro\Anthropic as AnthropicConnector;

class Anthropic extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AnthropicConnector::class;
    }
}
