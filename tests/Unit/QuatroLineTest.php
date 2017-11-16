<?php

namespace Evaneos\Kata\Tests\Unit;

use Evaneos\Kata\Characteristics;
use Evaneos\Kata\Line;
use Evaneos\Kata\PawnBuilder;

class QuatroLineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider getIncompleteLines
     *
     * @param Line $line
     */
    public function an_incomplete_line_cannot_be_winning(Line $line)
    {
        self::assertFalse($line->isWinning());
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
                $this->getPawn()->withColor(Characteristics::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_DARK)->build()
            ]) ],
            'only light pawns' => [ new Line([
                $this->getPawn()->withColor(Characteristics::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_LIGHT)->build()
            ]) ],
            'only round pawns' => [ new Line([
                $this->getPawn()->withShape(Characteristics::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_ROUND)->build()
            ]) ],
            'only square pawns' => [ new Line([
                $this->getPawn()->withShape(Characteristics::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_SQUARE)->build()
            ]) ],
            'only short pawns' => [ new Line([
                $this->getPawn()->withSize(Characteristics::SIZE_SHORT)->build(),
                $this->getPawn()->withSize(Characteristics::SIZE_SHORT)->build(),
                $this->getPawn()->withSize(Characteristics::SIZE_SHORT)->build(),
                $this->getPawn()->withSize(Characteristics::SIZE_SHORT)->build()
            ]) ],
            'only solid pawns' => [ new Line([
                $this->getPawn()->withBody(Characteristics::BODY_SOLID)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_SOLID)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_SOLID)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_SOLID)->build()
            ]) ],
            'only hollow pawns' => [ new Line([
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build()
            ]) ]
        ];
    }

    public function getLosingLines()
    {
        return [
            'one pawn has a different color' => [ new Line([
                $this->getPawn()->withColor(Characteristics::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_LIGHT)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_DARK)->build(),
                $this->getPawn()->withColor(Characteristics::COLOR_DARK)->build()
            ]) ],
            'one pawn has a different shape' => [ new Line([
                $this->getPawn()->withShape(Characteristics::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_SQUARE)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_ROUND)->build(),
                $this->getPawn()->withShape(Characteristics::SHAPE_ROUND)->build()
            ]) ],
            'one pawn has a different size' => [ new Line([
                $this->getPawn()->withSize(Characteristics::SIZE_SHORT)->build(),
                $this->getPawn()->withSize(Characteristics::SIZE_TALL)->build(),
                $this->getPawn()->withSize(Characteristics::SIZE_SHORT)->build(),
                $this->getPawn()->withSize(Characteristics::SIZE_SHORT)->build()
            ]) ],
            'one pawn has a different body' => [ new Line([
                $this->getPawn()->withBody(Characteristics::BODY_SOLID)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_SOLID)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_SOLID)->build()
            ]) ]
        ];
    }

    public function getIncompleteLines()
    {
        return [
            'line with three random pawns' => [ new Line([
                $this->getPawn()->build(),
                $this->getPawn()->build(),
                $this->getPawn()->build()
            ]) ],
            'line with two random pawns' => [ new Line([
                $this->getPawn()->build(),
                $this->getPawn()->build()
            ]) ],
            'line with one random pawn' => [ new Line([
                $this->getPawn()->build()
            ]) ],
            'line with three pawns sharing a characteristic' => [ new Line([
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build(),
                $this->getPawn()->withBody(Characteristics::BODY_HOLLOW)->build()
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
