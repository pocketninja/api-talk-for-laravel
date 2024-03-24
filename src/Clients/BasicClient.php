<?php

namespace PocketNinja\ApiTalk\Clients;

use PocketNinja\ApiTalk\ClientConfig;
use PocketNinja\ApiTalk\Contracts\Client;

class BasicClient implements Client
{
    public function __construct(
        public readonly string $url,
    ) {
    }

    public static function makeFromConfig(ClientConfig $config): Client
    {
        return new static($config->url);
    }
}
