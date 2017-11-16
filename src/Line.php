<?php

namespace Evaneos\Kata;

final class Line
{
    /** @var Pawn[] */
    private $pawns;

    /**
     * Line constructor.
     *
     * @param array $pawns
     */
    public function __construct(array $pawns)
    {
        $this->pawns = $pawns;
    }

    /**
     * @return bool
     */
    public function isWinning()
    {
        return true;
    }
}
