<?php

namespace Evaneos\Kata\Tests\Unit;

use Evaneos\Kata\Board;
use Evaneos\Kata\PawnBuilder;

class QuatroBoardTest extends \PHPUnit_Framework_TestCase
{
    /** @var Board */
    private $sut;

    public function setUp()
    {
        $this->sut = new Board();
    }

    /**
     * @test
     */
    public function a_pawn_can_be_placed_on_the_board()
    {
        $pawn = $this->getPawn()->build();
        $this->sut->place($pawn, Board::COLUMN_A, Board::LINE_1);
        $this->assertEquals($pawn, $this->sut->getPawn(Board::COLUMN_A, Board::LINE_1));
    }

    /**
     * @return PawnBuilder
     */
    private function getPawn()
    {
        return new PawnBuilder();
    }
}
