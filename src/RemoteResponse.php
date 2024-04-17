<?php

namespace PocketNinja\ApiTalk;

use Illuminate\Support\Arr;
use PocketNinja\ApiTalk\Contracts\TransformedResponse;

readonly class RemoteResponse implements TransformedResponse
{
    public array $body;

    public function __construct(
        public string $url,
        public bool $ok,
        public int $code,
        public string $contentType,
        public string $originalBody,
        public array $headers,
    ) {
        $this->body = match ($this->contentType) {
            'application/json' => $this->decodeFromJson($this->originalBody),
            'application/xml' => $this->decodeFromXml($this->originalBody),
            default => [],
        };
    }

    public function __get(string $name): mixed
    {
        return $this->get($name);
    }

    public function get(?string $propertyPath = null, mixed $default = null): mixed
    {
        if (is_null($propertyPath)) {
            return $this->body;
        }

        return Arr::get($this->body, $propertyPath, $default);
    }

    protected function decodeFromJson(string $json): array
    {
        return json_decode($json, true);
    }

    protected function decodeFromXml(string $xml): array
    {
        // @TODO Implement a much better approach to this. 🫠
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        return json_decode($json, true);
    }

}
