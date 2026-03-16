<?php

namespace App\Chess\Board;

use App\Chess\Contracts\ChessPiece;
use App\Chess\Position\Position;

class Board
{
    private array $cells = [];

    public function placePiece(ChessPiece $piece, Position $position): void
    {

    }

    public function movePiece(Position $from, Position $to): void
    {

    }

    public function getPiece(Position $position): ?ChessPiece
    {

    }

    public function setUp()
    {

    }
}