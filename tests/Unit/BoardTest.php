<?php

namespace Tests\Unit;

use App\Chess\Board\Board;
use App\Chess\Contracts\ChessPiece;
use App\Chess\Position\Position;
use Tests\TestCase;

class BoardTest extends TestCase
{
    public function test_place_piece_puts_piece_on_board(): void
    {
        $board = new Board();

        $piece = $this->createMock(ChessPiece::class);
        $position = new Position(1, 1);

        $board->placePiece($piece, $position);

        $this->assertSame($piece, $board->getPiece($position));
    }

    public function test_get_piece_returns_null_when_cell_empty(): void
    {
        $board = new Board();

        $this->assertNull(
            $board->getPiece(new Position(5, 5))
        );
    }

    public function test_move_piece_moves_piece_to_new_position(): void
    {
        $board = new Board();

        $piece = $this->createMock(ChessPiece::class);

        $from = new Position(1, 1);
        $to = new Position(2, 3);

        $board->placePiece($piece, $from);

        $board->movePiece($from, $to);

        $this->assertNull($board->getPiece($from));

        $this->assertSame(
            $piece,
            $board->getPiece($to)
        );
    }
}