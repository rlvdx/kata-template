<?php

namespace Evaneos\Kata\Tests\Unit;

use Evaneos\Kata\Line;
use Evaneos\Kata\Pawn;
use Evaneos\Kata\PawnBuilder;

class QuatroTest extends \PHPUnit_Framework_TestCase
{
    private $sut;

    protected function setUp()
    {
        $this->sut = null;
    }

    /**
     * @test
     * @dataProvider getWinningLines
     *
     * @param Line $line
     */
    public function a_complete_line_is_winning_if_all_pawns_share_at_least_one_characteristic(Line $line)
    {
        self::assertTrue($line->isWinning());
    }

    /**
     * @test
     * @dataProvider getLosingLines
     *
     * @param Line $line
     */
    public function a_complete_line_is_not_winning_if_not_all_pawns_share_a_characteristic(Line $line)
    {
        self::assertFalse($line->isWinning());
    }

    public function getWinningLines()
    {
        return [
            'only dark pawns' => [ new Line([
                $this->getPawn()->withColor(Pawn::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_DARK)->build()
            ]) ],
            'only light pawns' => [ new Line([
                $this->getPawn()->withColor(Pawn::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_LIGHT)->build()
            ]) ],
            'only round pawns' => [ new Line([
                $this->getPawn()->withShape(Pawn::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_ROUND)->build()
            ]) ],
            'only square pawns' => [ new Line([
                $this->getPawn()->withShape(Pawn::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_SQUARE)->build()
            ]) ]
        ];
    }

    public function getLosingLines()
    {
        return [
            'one pawn has a different color' => [ new Line([
                $this->getPawn()->withColor(Pawn::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Pawn::COLOR_DARK)->build()
            ]) ],
            'one pawn has a different shape' => [ new Line([
                $this->getPawn()->withShape(Pawn::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Pawn::SHAPE_ROUND)->build()
            ]) ]
        ];
    }

    /**
     * @return PawnBuilder
     */
    private function getPawn()
    {
        return new PawnBuilder();
    }
}
