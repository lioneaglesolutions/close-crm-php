<?php

namespace Lioneagle\Close\Contacts;

class Phone
{
    public function __construct(
        public        readonly string $number,
        public string $type = 'office'
    ) {}
}