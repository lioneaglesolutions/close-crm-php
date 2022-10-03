<?php

namespace Lioneagle\Close\Leads;

use Lioneagle\Close\Close;

class Leads
{
    public function __construct(
        private readonly Close $close
    ) {}

    public function create(CreateLeadRequest $request): Lead
    {
        $response = $this
            ->close
            ->client
            ->post('/lead', $request->toArray());

        return Lead::fromRequest($response->json());
    }

    public function updateStatus(Lead $lead, string $status): Lead
    {
        $response = $this->close
            ->client
            ->put("/lead/$lead->id", [
                'status' => $status,
            ]);

        return Lead::fromRequest($response->json());
    }
}