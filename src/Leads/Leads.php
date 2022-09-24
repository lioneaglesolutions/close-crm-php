<?php

namespace Lioneagle\Close\Leads;

use Lioneagle\Close\Close;

class Leads
{
    public function __construct(
        private readonly Close $close
    ) {}

    public function create(Lead $lead)
    {
        $response = $this
            ->close
            ->client
            ->post('/lead', [
                'name' => $lead->name,
            ]);

        dump($response->headers());
    }
}