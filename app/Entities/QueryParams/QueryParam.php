<?php

namespace App\Entities\QueryParams;

class QueryParam
{
    protected mixed $value;
    protected mixed $supreme;

    function __construct(object $supreme)
    {
        $this->supreme = $supreme;
    }

    static function make(object $supreme): static
    {
        return new static($supreme);
    }

    function set(mixed $value): object
    {
        $this->value = $value;
        return $this->supreme;
    }

    function get(): mixed
    {
        return $this->value;
    }
}
