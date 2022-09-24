<?php

namespace Lioneagle\Close\Leads;

class Lead
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $statusLabel,
        private readonly array $attributes = []
    ) {}

    public static function fromRequest(array $data): static
    {
        return new static(
            id: $data['id'],
            name: $data['name'],
            statusLabel: $data['status_label'],
            attributes: $data
        );
    }
}