<?php

namespace Curiosity\Application\Entity\Command;

use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Entity\Rover\Rover;
use Curiosity\Application\Type\Direction;

/**
 * Left command class.
 */
class Left implements CommandInterface {
    /**
     * Execute left command on Rover in Plateau.
     *
     * @param \Curiosity\Application\Entity\Rover\Rover     $rover
     * @param \Curiosity\Application\Entity\Plateau\Plateau $plateau
     */
    public function execute(Rover $rover, Plateau $plateau): void {
        switch ($rover->getOrientation()) {
            case Direction::East:
                $rover->setOrientation(Direction::North);
            break;
            case Direction::North:
                $rover->setOrientation(Direction::West);
            break;
            case Direction::South:
                $rover->setOrientation(Direction::East);
            break;
            case Direction::West:
                $rover->setOrientation(Direction::South);
            break;
        }
    }
}
