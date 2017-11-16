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
        return ! $this->getCommonCharacteristics()->isEmpty();
    }

    /**
     * @return Characteristics
     */
    private function getCommonCharacteristics()
    {
        return array_reduce(
            $this->pawns,
            function (Characteristics $characteristics, Pawn $pawn)
            {
                return $characteristics->commonCharacteristics($pawn->getCharacteristics());
            },
            Characteristics::full()
        );
    }
}
