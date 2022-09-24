<?php

namespace Lioneagle\Close\Leads;

class Lead
{
    public function __construct(
        public readonly string $name
    ) {}
}