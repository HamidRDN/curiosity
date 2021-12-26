<?php

namespace Curiosity\Application\Entity\Plateau;

use InvalidArgumentException;
use Curiosity\Application\Type\Coordinate;

/**
 * PlateauFactory class.
 * Static factory class to create Plateau object.
 */
class PlateauFactory {
    /**
     * Create Plateau from upper coordinate string.
     *
     * @param string $plateauUpperRightCoordination Should be valid coordination in format 'int:X int:Y'. Example: '5 50'
     * @return \Curiosity\Application\Entity\Plateau\Plateau
     */
    public static function create(string $plateauUpperRightCoordination): Plateau {
        if (preg_match('@(?<x>\d+)\s(?<y>\d+)@', $plateauUpperRightCoordination, $matches) !== 1) {
            throw new InvalidArgumentException(sprintf('Invalid plateau upper right coordinate "%s"', $plateauUpperRightCoordination));
        }
        return new Plateau(new Coordinate(0, 0), new Coordinate((int)$matches['x'], (int)$matches['y']));
    }
}
