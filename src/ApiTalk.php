<?php

namespace PocketNinja\ApiTalk;

class ApiTalk
{
    public function client(string $apiName): Contracts\Client
    {
        $config = config('api-talk.apis.'.$apiName);

        if (empty($config) || ! is_array($config)) {
            throw new \InvalidArgumentException(
                sprintf('API with name "%s" not found.', $apiName)
            );
        }

        return (new ClientConfig($apiName, ...$config))->makeClient();
    }
}
