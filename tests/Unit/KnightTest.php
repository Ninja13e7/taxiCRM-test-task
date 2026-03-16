<?php

namespace Tests\Unit;

use App\Chess\Board\Board;
use App\Chess\Pieces\Knight\Knight;
use App\Chess\Position\Position;
use Tests\TestCase;

class KnightTest extends TestCase
{
    public function test_knight_can_move_in_l_shape(): void
    {
        $board = new Board();
        $knight = new Knight();

        $from = new Position(1, 1);
        $to = new Position(3, 2);

        $board->placePiece($knight, $from);

        $result = $knight->move($from, $to, $board);

        $this->assertTrue($result);
        $this->assertNull($board->getPiece($from));
        $this->assertSame($knight, $board->getPiece($to));
    }

    public function test_knight_can_move_in_second_l_shape(): void
    {
        $board = new Board();
        $knight = new Knight();

        $from = new Position(4, 4);
        $to = new Position(5, 6);

        $board->placePiece($knight, $from);

        $result = $knight->move($from, $to, $board);

        $this->assertTrue($result);
        $this->assertSame($knight, $board->getPiece($to));
    }

    public function test_knight_cannot_move_straight(): void
    {
        $board = new Board();
        $knight = new Knight();

        $from = new Position(1, 1);
        $to = new Position(1, 3);

        $board->placePiece($knight, $from);

        $result = $knight->move($from, $to, $board);

        $this->assertFalse($result);
        $this->assertSame($knight, $board->getPiece($from));
    }

    public function test_knight_symbol(): void
    {
        $knight = new Knight();

        $this->assertSame('K', $knight->symbol());
    }
}