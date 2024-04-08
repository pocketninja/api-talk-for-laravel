<?php

namespace PocketNinja\ApiTalk;

use PocketNinja\ApiTalk\Clients\BasicClient;
use PocketNinja\ApiTalk\Contracts\Client;

class ClientConfig
{
    public function __construct(
        public readonly string $name,
        public readonly string $url,
        public readonly string $driver = BasicClient::class,
    ) {
        if (empty($driver)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'API with name "%s" does not have a driver specified.',
                    $name
                )
            );
        }

        $implementations = class_implements($driver) ?: [];

        if (! in_array(Contracts\Client::class, $implementations)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'API with name "%s" does not have a valid client type specified. A type should derive from PocketNinja\ApiTalk\Contracts\Client',
                    $name
                )
            );
        }
    }

    public function makeClient(): Client
    {
        return $this->driver::makeFromConfig($this);
    }
}
