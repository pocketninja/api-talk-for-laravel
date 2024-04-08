<?php

namespace PocketNinja\ApiTalk\Clients;

use PocketNinja\ApiTalk\ClientConfig;
use PocketNinja\ApiTalk\Contracts\Client;
use PocketNinja\ApiTalk\Traits\BuildsRequestsFromVerbs;

class BasicClient implements Client
{
    use BuildsRequestsFromVerbs;

    public function __construct(
        public readonly string $url,
    ) {
    }

    public static function makeFromConfig(ClientConfig $config): Client
    {
        return new static($config->url);
    }
}
