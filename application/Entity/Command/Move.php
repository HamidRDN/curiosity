<?php

namespace Curiosity\Application\Entity\Command;

use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Entity\Rover\Rover;
use Curiosity\Application\Type\Coordinate;
use Curiosity\Application\Type\Direction;

/**
 * Move command class.
 */
class Move implements CommandInterface {
    /**
     * Execute Move command on Rover in Plateau.
     *
     * @param \Curiosity\Application\Entity\Rover\Rover     $rover
     * @param \Curiosity\Application\Entity\Plateau\Plateau $plateau
     */
    public function execute(Rover $rover, Plateau $plateau): void {
        $newCoordinate = null;
        switch ($rover->getOrientation()) {
            case Direction::North:
                $newCoordinate = new Coordinate($rover->getPosition()->getX(), $rover->getPosition()->getY() + 1);
            break;
            case Direction::West:
                $newCoordinate = new Coordinate($rover->getPosition()->getX() - 1, $rover->getPosition()->getY());
            break;
            case Direction::East:
                $newCoordinate = new Coordinate($rover->getPosition()->getX() + 1, $rover->getPosition()->getY());
            break;
            case Direction::South:
                $newCoordinate = new Coordinate($rover->getPosition()->getX(), $rover->getPosition()->getY() - 1);
            break;
            default:
                new Coordinate($rover->getPosition()->getX(), $rover->getPosition()->getY());
        }
        if ($plateau->isCoordinateInbound($newCoordinate)) {
            $rover->setPosition($newCoordinate);
        }
    }
}
