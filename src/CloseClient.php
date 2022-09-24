<?php

namespace Lioneagle\Close;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class CloseClient
{
    public function __construct(
        private readonly string $baseUrl,
        private readonly string $apiKey
    ) {}

    public function get(string $uri): Response
    {
        return $this->request()->get($uri);
    }

    public function post(string $uri, array $body = []): Response
    {
        return $this->request()
            ->post($uri, $body);
    }

    protected function request(): PendingRequest
    {
        dump($this->apiKey);

        return Http::withBasicAuth($this->apiKey, '')
            ->baseUrl($this->baseUrl);
    }
}