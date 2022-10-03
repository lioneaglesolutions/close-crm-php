<?php

namespace Lioneagle\Close;

abstract class Entity
{
    public function __construct(
        private array $attributes = []
    ) {}

    public static function make(array $attributes = []): static
    {
        return new static($attributes);
    }

    public function __get(string $key)
    {
        return $this->attributes[$key];
    }

    public function __set($key, $value)
    {
        $this->attributes[$key] = $value;
    }
}