<?php

namespace PocketNinja\ApiTalk\Contracts;

use PocketNinja\ApiTalk\ClientConfig;

interface Client extends ProvidesRequestBuilderFromVerbs
{
    public static function makeFromConfig(ClientConfig $config): Client;

}
