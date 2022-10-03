<?php

namespace Lioneagle\Close\Contacts;

class CreateContactRequest
{
    protected ?Email $email = null;

    protected ?Phone $phone = null;

    protected array $customFields = [];

    public function __construct(
        public readonly string $name,
    ) {}

    public function email(string $email): static
    {
        $this->email = new Email($email);

        return $this;
    }

    public function phone(string $number): static
    {
        $this->phone = new Phone($number);

        return $this;
    }

    public function toArray(): array
    {
        $data = [
            'name' => $this->name,
        ];

        if ($this->email) {
            $data['emails'][] = [
                'type' => $this->email->type,
                'email' => $this->email->address,
            ];
        }

        if ($this->phone) {
            $data['phones'][] = [
                'type' => $this->phone->type,
                'phone' => $this->phone->number,
            ];
        }

        if (count($this->customFields) > 0) {
            foreach($this->customFields as $key => $value) {
                $data['custom.' . $key] = $value;
            }
        }

        return $data;
    }

    public function addCustomField(string $key, string $value): static
    {
        $this->customFields[$key] = $value;

        return $this;
    }

    public function setRole(?string $role): static
    {
        $this->role = $role;

        return $this;
    }
}