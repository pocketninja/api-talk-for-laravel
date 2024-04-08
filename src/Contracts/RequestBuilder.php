<?php

namespace PocketNinja\ApiTalk\Contracts;

interface RequestBuilder
{
    /**
     * Sets the client to perform the request with.
     *
     * @param  Client  $client
     * @return $this
     */
    public function withClient(Client $client): static;

    /**
     * Create a get request, with the path to the data in the response.
     *
     * @param  string  $path
     *
     * @return $this
     */
    public function get(string $path): static;

    /**
     * Create a post request with a body of data.
     *
     * @param  array  $data
     * @return $this
     */
    public function post(array $data): static;

    public function transformWith(string $transformerClass): static;

    public function to(string $endpoint): TransformedResponse; // Response contract?

    public function from(string $endpoint): TransformedResponse; // Response contract?
}
