<?php

namespace App\Chess\Contracts;

use App\Chess\Board\Board;
use App\Chess\Position\Position;

interface ChessPiece
{
    public function move(Position $from, Position $to, Board $board): true;

    public function symbol(): string;
}