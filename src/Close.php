<?php

namespace Lioneagle\Close;

use Lioneagle\Close\Leads\Leads;

class Close
{
    public function __construct(
        public readonly CloseClient $client
    ) {}

    public function leads(): Leads
    {
        return new Leads($this);
    }
}