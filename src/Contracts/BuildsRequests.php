<?php

namespace PocketNinja\ApiTalk\Contracts;

interface BuildsRequests extends ProvidesRequestBuilderFromVerbs
{
    /**
     * Sets the client to perform the request with.
     *
     * @param  Client  $client
     * @return $this
     */
    public function withClient(Client $client): static;

    public function transformWith(string $transformerClass): static;

    public function to(string $endpoint): TransformedResponse; // Response contract?

    public function from(string $endpoint): TransformedResponse; // Response contract?
}
