<?php

namespace Curiosity\Application\Type;

/**
 * Coordinate type class.
 */
class Coordinate {

    /**
     * Coordinate x position.
     *
     * @var int
     */
    private int $x;

    /**
     * Coordinate y position.
     *
     * @var int
     */
    private int $y;

    /**
     * Coordinate constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x, int $y) {
        $this->setX($x);
        $this->setY($y);
    }

    /**
     * Coordinate x position getter.
     *
     * @return int
     */
    public function getX(): int {
        return $this->x;
    }

    /**
     * Coordinate x position setter.
     *
     * @return void
     */
    public function setX(int $x) {
        $this->x = $x;
    }

    /**
     * Coordinate y position getter.
     *
     * @return int
     */
    public function getY(): int {
        return $this->y;
    }

    /**
     * Coordinate y position setter.
     *
     * @return void
     */
    public function setY(int $y) {
        $this->y = $y;
    }
}