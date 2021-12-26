<?php

namespace Curiosity\Application\Entity\Rover;

use InvalidArgumentException;
use Curiosity\Application\Type\Coordinate;
use Curiosity\Application\Type\Direction;

/**
 * RoverFactory class.
 * Static factory class to create Rover object.
 */
class RoverFactory {
    /**
     * Create Rover object from position string.
     *
     * @param string $roverPosition Should be valid position in format 'int:X int:Y string:Orientation'. Example: '2 10 S'
     * @return \Curiosity\Application\Entity\Rover\Rover
     */
    public static function create(string $roverPosition): Rover {
        if (preg_match('@(?<x>\d+)\s(?<y>\d+)\s(?<direction>[A-Z])@', $roverPosition, $matches) !== 1) {
            throw new InvalidArgumentException(sprintf('Invalid rover position "%s"', $roverPosition));
        }
        if (Direction::isValid($matches['direction']) === false) {
            throw new InvalidArgumentException(sprintf('Invalid rover direction "%s"', $matches['direction']));
        }
        return new Rover(new Coordinate((int)$matches['x'], (int)$matches['y']), $matches['direction']);
    }
}
