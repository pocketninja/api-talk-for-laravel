<?php

namespace PocketNinja\ApiTalk;

use PocketNinja\ApiTalk\Contracts\Client;
use PocketNinja\ApiTalk\Contracts\BuildsRequests as RequestBuilderContract;
use PocketNinja\ApiTalk\Enums\Verb;

class RequestBuilder implements RequestBuilderContract
{
    protected Client $client;
    protected Verb $verb;
    protected array $data = [];

    public function withClient(Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function get(): static
    {
        $this->verb = Verb::GET;

        return $this;
    }

    public function post(): static
    {
        $this->verb = Verb::POST;

        return $this;
    }

    public function with(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function to(string $endpoint): Contracts\TransformedResponse
    {
        $this->verb->assertCanVerbTo();
        return $this->client->processRequest(app(Request::class, [
            'verb' => $this->verb,
            'path' => $endpoint,
            'data' => $this->data,
        ]));
    }

    public function from(string $endpoint): Contracts\TransformedResponse
    {
        $this->verb->assertCanVerbFrom();
        return $this->client->processRequest(app(Request::class, [
            'verb' => $this->verb,
            'path' => $endpoint,
            'data' => $this->data,
        ]));
    }

//    public function transformResponseWith(ResponseTransformer $transformer): static
//    {
//        // TODO: Implement transformWith() method.
//    }
}
