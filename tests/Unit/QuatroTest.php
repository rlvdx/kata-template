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
    */
    public function a_complete_line_is_winning_if_all_pawns_share_at_least_one_characteristic()
    {
        $pawn1 = $this->getPawn()
            ->withColor(Pawn::COLOR_DARK)
            ->build();
        $pawn2 = $this->getPawn()
            ->withColor(Pawn::COLOR_DARK)
            ->build();
        $pawn3 = $this->getPawn()
            ->withColor(Pawn::COLOR_DARK)
            ->build();
        $pawn4 = $this->getPawn()
            ->withColor(Pawn::COLOR_DARK)
            ->build();

        $line = new Line([
            $pawn1,
            $pawn2,
            $pawn3,
            $pawn4
        ]);

        self::assertTrue($line->isWinning());
    }

    /**
     * @test
     */
    public function a_complete_line_is_not_winning_if_not_all_pawns_share_a_characteristic()
    {
        $pawn1 = $this->getPawn()
            ->withColor(Pawn::COLOR_DARK)
            ->build();
        $pawn2 = $this->getPawn()
            ->withColor(Pawn::COLOR_LIGHT)
            ->build();
        $pawn3 = $this->getPawn()
            ->withColor(Pawn::COLOR_DARK)
            ->build();
        $pawn4 = $this->getPawn()
            ->withColor(Pawn::COLOR_DARK)
            ->build();

        $line = new Line([
            $pawn1,
            $pawn2,
            $pawn3,
            $pawn4
        ]);

        self::assertFalse($line->isWinning());
    }

    /**
     * @return PawnBuilder
     */
    private function getPawn()
    {
        return new PawnBuilder();
    }
}
