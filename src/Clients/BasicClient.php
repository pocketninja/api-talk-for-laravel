<?php

namespace PocketNinja\ApiTalk\Clients;

use Illuminate\Support\Facades\Http;
use PocketNinja\ApiTalk\ClientConfig;
use PocketNinja\ApiTalk\Contracts\Client;
use PocketNinja\ApiTalk\Concerns\BuildsRequestsFromVerbs;
use PocketNinja\ApiTalk\Contracts\TransformedResponse;
use PocketNinja\ApiTalk\Enums\Verb;
use PocketNinja\ApiTalk\Request;

class BasicClient implements Client
{

    use BuildsRequestsFromVerbs;

    public function __construct(
        public readonly string $baseUrl,
    ) {
    }

    public static function makeFromConfig(ClientConfig $config): Client
    {
        return new static($config->url);
    }

    public function processRequest(Request $request): TransformedResponse
    {
        // @TODO Implement headers.
        $pending = Http::withHeaders([]);

        $url = sprintf(
            '%s/%s',
            rtrim($this->baseUrl, '/'),
            ltrim($request->path, '/')
        );

        $response = match ($request->verb) {
            Verb::GET => $pending->get($url, $request->data),
            Verb::POST => $pending->post($url, $request->data),
            Verb::PUT => $pending->put($url, $request->data),
            Verb::PATCH => $pending->patch($url, $request->data),
            Verb::DELETE => $pending->delete($url, $request->data),
        };

        return app(
            TransformedResponse::class, [
                'url' => $url,
                'ok' => $response->ok(),
                'code' => $response->status(),
                'contentType' => $response->header('Content-Type'),
                'originalBody' => $response->body(),
                'headers' => $response->headers(),
            ]
        );
    }
}
