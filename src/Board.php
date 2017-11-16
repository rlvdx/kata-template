<?php

namespace Evaneos\Kata;

class Board
{
    const COLUMN_A = 'A';
    const COLUMN_B = 'B';
    const COLUMN_C = 'C';
    const COLUMN_D = 'D';

    const LINE_1 = '1';
    const LINE_2 = '2';
    const LINE_3 = '3';
    const LINE_4 = '4';

    /** @var Pawn[][] */
    private $grid;

    /**
     * Board constructor.
     */
    public function __construct()
    {
        $this->initGrid();
    }

    /**
     * @param Pawn   $pawn
     * @param string $column
     * @param string $line
     */
    public function place(Pawn $pawn, $column, $line)
    {
        $this->grid[$column][$line] = $pawn;
    }

    /**
     * @param string $column
     * @param string $line
     *
     * @return Pawn|null
     */
    public function getPawn($column, $line)
    {
        return $this->grid[$column][$line];
    }

    private function initGrid()
    {
        $this->grid = [
            self::COLUMN_A => [
                self::LINE_1 => null,
                self::LINE_2 => null,
                self::LINE_3 => null,
                self::LINE_4 => null,
            ],
            self::COLUMN_B => [
                self::LINE_1 => null,
                self::LINE_2 => null,
                self::LINE_3 => null,
                self::LINE_4 => null,
            ],
            self::COLUMN_C => [
                self::LINE_1 => null,
                self::LINE_2 => null,
                self::LINE_3 => null,
                self::LINE_4 => null,
            ],
            self::COLUMN_D => [
                self::LINE_1 => null,
                self::LINE_2 => null,
                self::LINE_3 => null,
                self::LINE_4 => null,
            ]
        ];
    }
}
