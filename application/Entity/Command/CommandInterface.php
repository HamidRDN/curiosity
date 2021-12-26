<?php

namespace Curiosity\Application\Entity\Command;

use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Entity\Rover\Rover;

/**
 * Command interface.
 */
interface CommandInterface {
    /**
     * Interface for command execute method.
     *
     * @param \Curiosity\Application\Entity\Rover\Rover     $rover
     * @param \Curiosity\Application\Entity\Plateau\Plateau $plateau
     */
    public function execute(Rover $rover, Plateau $plateau): void;
}
