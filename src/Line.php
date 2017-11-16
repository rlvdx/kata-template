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
        return count($this->getLineDifferentColors()) === 1;
    }

    /**
     * @return string[]
     */
    private function getLineDifferentColors()
    {
        return array_unique(
            array_reduce(
                $this->pawns,
                function ($colors, Pawn $pawn) {
                    $colors[] = $pawn->getColor();

                    return $colors;
                },
                []
            )
        );
    }
}
