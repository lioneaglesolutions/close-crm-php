<?php

namespace Lioneagle\Close\Tests\Fixtures;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait CloseAPIFakes
{
    public function url(?string $append = null)
    {
        $base = config('close.base_url');

        return $append ? $base . $append : $base;
    }

    public function fakeCreateLead(): void
    {
        Http::preventStrayRequests();
        
        Http::fake([
            $this->url('/lead') => function (Request $request) {
                return [
                    'id' => Str::uuid(),
                    'name' => $request->data()['name'],
                    'status_label' => $request->data()['status_label'] ?? 'Potential',
                ];
            },
        ]);
    }
}