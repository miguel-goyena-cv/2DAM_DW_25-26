<?php

namespace App\Model;

class RestauranteNewDTO
{
    public function __construct(
        public string $name,
        public int $resType
    ) {}
}