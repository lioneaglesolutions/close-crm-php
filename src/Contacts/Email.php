<?php

namespace Lioneagle\Close\Contacts;

class Email
{
    public function __construct(
        public        readonly string $address,
        public string $type = 'office'
    ) {}
}