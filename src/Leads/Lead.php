<?php

namespace Lioneagle\Close\Leads;

use Lioneagle\Close\Entity;

/**
 * @property string $id
 * @property string $name
 * @property string $status_label
 */
class Lead extends Entity
{
    public static function fromRequest(array $data): static
    {
        return new static(
            attributes: $data
        );
    }
}