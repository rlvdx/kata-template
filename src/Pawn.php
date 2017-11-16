<?php

namespace Evaneos\Kata;

final class Pawn
{
    /** @var string */
    private $color;

    /** @var string */
    private $shape;

    /** @var string */
    private $size;

    /** @var string */
    private $body;

    /**
     * Pawn constructor.
     *
     * @param string $color
     * @param string $shape
     * @param string $size
     * @param string $body
     */
    public function __construct(
        $color,
        $shape,
        $size,
        $body
    ) {
        $this->color = $color;
        $this->shape = $shape;
        $this->size  = $size;
        $this->body  = $body;
    }

    /**
     * @return Characteristics
     */
    public function getCharacteristics()
    {
        return new Characteristics([
            $this->color,
            $this->shape,
            $this->size,
            $this->body,
        ]);
    }
}
