<?php

namespace Lioneagle\Close\Contacts;

use Lioneagle\Close\Entity;

/**
 * @property string $id
 * @property string $name
 * @property \Lioneagle\Close\Contacts\Email $email
 * @property \Lioneagle\Close\Contacts\Phone $phone
 */
class Contact extends Entity
{
    public function setEmailFromString(string $email): static
    {
        $this->email = new Email($email);

        return $this;
    }

    public function setPhoneFromString(string $number): static
    {
        $this->email = new Phone($number);

        return $this;
    }

    public function toArray() {}
}