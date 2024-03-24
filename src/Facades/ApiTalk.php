<?php

namespace PocketNinja\ApiTalk\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PocketNinja\ApiTalk\ApiTalk
 */
class ApiTalk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \PocketNinja\ApiTalk\ApiTalk::class;
    }
}
