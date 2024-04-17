<?php

namespace PocketNinja\ApiTalk;

use PocketNinja\ApiTalk\Enums\Verb;

readonly class Request
{
    public function __construct(
        public Verb $verb,
        public string $path,
        public array $data = [],
    ) {
    }
}
