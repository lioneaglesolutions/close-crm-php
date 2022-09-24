<?php

namespace Lioneagle\Close\Leads;

use Lioneagle\Close\Close;

class Leads
{
    public function __construct(
        private readonly Close $close
    ) {}

    public function create(CreateLeadRequest $lead): Lead
    {
        $response = $this
            ->close
            ->client
            ->post('/lead', [
                'name' => $lead->name,
                'status' => $lead->status,
            ]);

        return Lead::fromRequest($response->json());
    }
}