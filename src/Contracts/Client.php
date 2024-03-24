<?php

namespace PocketNinja\ApiTalk\Contracts;

use PocketNinja\ApiTalk\ClientConfig;

interface Client
{
    public static function makeFromConfig(ClientConfig $config): Client;

    public function get(string $endpoint);
}
