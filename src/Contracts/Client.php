<?php

namespace PocketNinja\ApiTalk\Contracts;

use PocketNinja\ApiTalk\ClientConfig;
use PocketNinja\ApiTalk\Request;

interface Client extends ProvidesRequestBuilderFromVerbs
{
    public static function makeFromConfig(ClientConfig $config): Client;

    public function processRequest(Request $request): TransformedResponse;
}
