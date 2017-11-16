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
        return count($this->getLineDifferentColors()) === 1
            || count($this->getLineDifferentShapes()) === 1
            || count($this->getLineDifferentSizes()) === 1;
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
                    $color = $pawn->getColor();

                    if ($color !== null) {
                        $colors[] = $color;
                    }

                    return $colors;
                },
                []
            )
        );
    }

    /**
     * @return string[]
     */
    private function getLineDifferentShapes()
    {
        return array_unique(
            array_reduce(
                $this->pawns,
                function ($shapes, Pawn $pawn) {
                    $shape = $pawn->getShape();

                    if ($shape !== null) {
                        $shapes[] = $shape;
                    }

                    return $shapes;
                },
                []
            )
        );
    }

    /**
     * @return string[]
     */
    private function getLineDifferentSizes()
    {
        return array_unique(
            array_reduce(
                $this->pawns,
                function ($sizes, Pawn $pawn) {
                    $size = $pawn->getSize();

                    if ($size !== null) {
                        $sizes[] = $size;
                    }

                    return $sizes;
                },
                []
            )
        );
    }
}
