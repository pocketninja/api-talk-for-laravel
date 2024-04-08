<?php

namespace PocketNinja\ApiTalk;

use PocketNinja\ApiTalk\Contracts\Client;
use PocketNinja\ApiTalk\Contracts\RequestBuilder as RequestBuilderContract;

class RequestBuilder implements RequestBuilderContract
{
    protected Client $client;

    public function withClient(Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function get(string $path): static
    {
        // TODO: Implement get() method.

        return $this;
    }

    public function post(array $data): static
    {
        // TODO: Implement post() method.

        return $this;
    }

    public function to(string $endpoint): static
    {
        // TODO: Implement to() method.
    }

    public function from(string $endpoint): static
    {
        // TODO: Implement from() method.
    }

    public function transformWith(string $transformerClass): static
    {
        // TODO: Implement transformWith() method.
    }
}
