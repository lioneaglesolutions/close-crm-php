<?php

namespace Lioneagle\Close\Leads;

use Lioneagle\Close\Contacts\CreateContactRequest;

class CreateLeadRequest
{
    protected array $contacts = [];

    protected array $customFields = [];

    public function __construct(
        public readonly string $name,
        public readonly ?string $status = null
    ) {}

    public function addContact(CreateContactRequest $contact): static
    {
        $this->contacts[] = $contact;

        return $this;
    }

    public function hasContacts(): bool
    {
        return count($this->contacts) > 0;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
            'status' => $this->status,
        ];

        if ($this->hasContacts()) {
            $data = $this->mergeContacts($data);
        }

        if (count($this->customFields) > 0) {
            foreach($this->customFields as $key => $value) {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    public function addCustomField(string $key, string $value): static
    {
        $this->customFields[$key] = $value;

        return $this;
    }

    private function mergeContacts(array $data): array
    {
        $data['contacts'] = [];

        /** @var \Lioneagle\Close\Contacts\CreateContactRequest $contact */
        foreach($this->contacts as $contact) {
            $data['contacts'][] = $contact->toArray();
        }

        return $data;
    }
}