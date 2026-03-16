<?php

namespace App\Chess\Console\Commands;

use App\Chess\Board\Board;
use App\Chess\Position\Position;
use Illuminate\Console\Command;

class ChessCommand extends Command
{
    protected $signature = 'app:chess';

    public function handle()
    {
        $board = new Board();
        $board->setUp();

        $this->renderBoard($board);

        while (true) {

            $from = $this->ask('Выберите фигуру (например b1)');
            $to = $this->ask('Куда ходить (например c3)');

            $fromPos = $this->parsePosition($from);
            $toPos = $this->parsePosition($to);

            $piece = $board->getPiece($fromPos);

            if (!$piece) {
                $this->error('Там нет фигуры');
                continue;
            }

            if (!$piece->move($fromPos, $toPos, $board)) {
                $this->error('Невозможный ход');
                continue;
            }

            $this->info("Ход выполнен: $from -> $to");

            $this->renderBoard($board);
        }
    }

    public function renderBoard(Board $board)
    {
        for ($y = 8; $y >= 1; $y--) {
            $line = $y . ' ';

            for ($x = 1; $x <= 8; $x++) {
                $piece = $board->getPiece(new Position($x, $y));
                $line .= $piece ? $piece->symbol() : '.';
                $line .= ' ';
            }

            $this->line($line);
        }

        $this->line('  a b c d e f g h');
    }

    private function parsePosition(string $input): Position
    {
        $letters = [
            'a' => 1,'b' => 2,'c' => 3,'d' => 4,
            'e' => 5,'f' => 6,'g' => 7,'h' => 8,
        ];

        $x = $letters[$input[0]];
        $y = (int)$input[1];

        return new Position($x, $y);
    }
}
