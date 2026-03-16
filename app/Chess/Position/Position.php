<?php

namespace App\Chess\Position;

class Position
{
    public function __construct(
        public int $x,
        public int $y,
    ) {}
}