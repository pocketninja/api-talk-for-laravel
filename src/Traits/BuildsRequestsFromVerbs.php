<?php

namespace PocketNinja\ApiTalk\Traits;

use PocketNinja\ApiTalk\Contracts\Client;
use PocketNinja\ApiTalk\Contracts\RequestBuilder;

/**
 * @mixin Client
 */
trait BuildsRequestsFromVerbs
{
    public static function makeBuilder(): RequestBuilder
    {
        return new app(RequestBuilder::class);
    }

    public function get(string $path): RequestBuilder
    {
        return static::makeBuilder()->withClient($this)->get($path);
    }

    public function post(array $data): RequestBuilder
    {
        return static::makeBuilder()->withClient($this)->post($data);
    }
}
