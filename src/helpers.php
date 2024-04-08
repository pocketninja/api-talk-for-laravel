<?php

use PocketNinja\ApiTalk\ApiTalk;
use PocketNinja\ApiTalk\Contracts\Client;

function apiTalk(?string $apiName = null): Client|ApiTalk
{
    /** @var ApiTalk $service */
    $service = app(ApiTalk::class);

    return empty($apiName)
        ? $service
        : $service->client($apiName);
}
