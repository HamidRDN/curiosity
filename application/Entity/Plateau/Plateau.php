<?php

namespace Curiosity\Application\Entity\Plateau;

use Curiosity\Application\Type\Coordinate;

/**
 * Plateau entity class.
 */
class Plateau {

    /**
     * Plateau lower coordinate.
     *
     * @var \Curiosity\Application\Type\Coordinate
     */
    private Coordinate $lowerLeft;

    /**
     * Plateau upper coordinate.
     *
     * @var \Curiosity\Application\Type\Coordinate
     */
    private Coordinate $upperRight;

    /**
     * Plateau constructor.
     *
     * @param \Curiosity\Application\Type\Coordinate $lowerCoordinate
     * @param \Curiosity\Application\Type\Coordinate $upperCoordinate
     */
    public function __construct(Coordinate $lowerCoordinate, Coordinate $upperCoordinate) {
        $this->setLowerLeft($lowerCoordinate);
        $this->setUpperRight($upperCoordinate);
    }

    /**
     * Plateau lower coordinate getter.
     *
     * @return \Curiosity\Application\Type\Coordinate
     */
    public function getLowerLeft(): Coordinate {
        return $this->lowerLeft;
    }

    /**
     * Plateau lower coordinate setter.
     *
     * @param \Curiosity\Application\Type\Coordinate $coordinate
     * @return void
     */
    public function setLowerLeft(Coordinate $coordinate): void {
        $this->lowerLeft = $coordinate;
    }

    /**
     * Plateau upper coordinate getter.
     *
     * @return \Curiosity\Application\Type\Coordinate
     */
    public function getUpperRight(): Coordinate {
        return $this->upperRight;
    }

    /**
     * Plateau upper coordinate setter.
     *
     * @param \Curiosity\Application\Type\Coordinate $coordinate
     * @return void
     */
    public function setUpperRight(Coordinate $coordinate): void {
        $this->upperRight = $coordinate;
    }

    /**
     * Check to see if given Coordinate is Inbound of Plateau.
     *
     * @param \Curiosity\Application\Type\Coordinate $coordinate
     * @return bool
     */
    public function isCoordinateInbound(Coordinate $coordinate): bool {
        if ($coordinate->getX() < $this->getLowerLeft()->getX()) {
            return false;
        }
        if ($coordinate->getX() > $this->getUpperRight()->getX()) {
            return false;
        }
        if ($coordinate->getY() < $this->getLowerLeft()->getY()) {
            return false;
        }
        if ($coordinate->getY() > $this->getUpperRight()->getY()) {
            return false;
        }
        return true;
    }
}
