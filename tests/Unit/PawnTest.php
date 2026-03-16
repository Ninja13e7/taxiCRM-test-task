<?php

namespace Tests\Unit;

use App\Chess\Board\Board;
use App\Chess\Pieces\Pawn\Pawn;
use App\Chess\Position\Position;
use Tests\TestCase;

class PawnTest extends TestCase
{
    public function test_pawn_can_move_forward_one_cell(): void
    {
        $board = new Board();
        $pawn = new Pawn();

        $from = new Position(2, 2);
        $to = new Position(2, 3);

        $board->placePiece($pawn, $from);

        $result = $pawn->move($from, $to, $board);

        $this->assertTrue($result);
        $this->assertNull($board->getPiece($from));
        $this->assertSame($pawn, $board->getPiece($to));
    }

    public function test_pawn_cannot_move_sideways(): void
    {
        $board = new Board();
        $pawn = new Pawn();

        $from = new Position(2, 2);
        $to = new Position(3, 2);

        $board->placePiece($pawn, $from);

        $result = $pawn->move($from, $to, $board);

        $this->assertFalse($result);
        $this->assertSame($pawn, $board->getPiece($from));
    }

    public function test_pawn_cannot_move_two_cells(): void
    {
        $board = new Board();
        $pawn = new Pawn();

        $from = new Position(2, 2);
        $to = new Position(2, 4);

        $board->placePiece($pawn, $from);

        $result = $pawn->move($from, $to, $board);

        $this->assertFalse($result);
        $this->assertSame($pawn, $board->getPiece($from));
    }

    public function test_pawn_symbol(): void
    {
        $pawn = new Pawn();

        $this->assertSame('P', $pawn->symbol());
    }
}