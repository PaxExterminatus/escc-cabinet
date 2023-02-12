<?php

namespace App\Entities;

trait MakeStaticTrait
{
    static function make(): static
    {
        return new static;
    }
}
