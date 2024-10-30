<?php

namespace JordanPartridge\Maestro\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \JordanPartridge\Maestro\Maestro
 */
class Maestro extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \JordanPartridge\Maestro\Maestro::class;
    }
}
