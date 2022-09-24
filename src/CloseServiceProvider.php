<?php

namespace Lioneagle\Close;

use Illuminate\Support\ServiceProvider;
use InvalidArgumentException;

class CloseServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/close.php' => config_path('close.php'),
            ], 'close');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/close.php', 'close');

        $this->app->singleton(CloseClient::class, $this->createClient(...));
    }

    public function createClient(): CloseClient
    {
        $apiKey = config('close.api_key');
        $baseUrl = config('close.base_url');

        if (! $apiKey || ! $baseUrl) {
            throw new InvalidArgumentException(
                "The Close configuration is invalid - ensure API Key and Base URL are set."
            );
        }

        return new CloseClient(
            baseUrl: $baseUrl,
            apiKey: $apiKey
        );
    }
}