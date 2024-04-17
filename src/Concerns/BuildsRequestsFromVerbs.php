<?php

namespace PocketNinja\ApiTalk\Concerns;

use PocketNinja\ApiTalk\Contracts\Client;
use PocketNinja\ApiTalk\Contracts\BuildsRequests;

/**
 * @mixin Client
 */
trait BuildsRequestsFromVerbs
{
    public static function makeBuilder(): BuildsRequests
    {
        return app(BuildsRequests::class);
    }

    public function get(): BuildsRequests
    {
        return static::makeBuilder()->withClient($this)->get();
    }

    public function post(): BuildsRequests
    {
        return static::makeBuilder()->withClient($this)->post();
    }

    public function with(array $data): BuildsRequests
    {
        return static::makeBuilder()->withClient($this)->with($data);
    }

}
