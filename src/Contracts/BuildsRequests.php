<?php

namespace PocketNinja\ApiTalk\Contracts;

interface BuildsRequests extends ProvidesRequestBuilderFromVerbs
{
    public function withClient(Client $client): static;

//    public function transformResponseWith(ResponseTransformer $transformer): static;

    public function to(string $endpoint): TransformedResponse;

    public function from(string $endpoint): TransformedResponse;
}
