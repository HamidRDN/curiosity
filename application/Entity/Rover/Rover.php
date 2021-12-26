<?php

namespace Curiosity\Application\Entity\Rover;

use InvalidArgumentException;
use Curiosity\Application\Entity\Command\CommandCollection;
use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Type\Coordinate;
use Curiosity\Application\Type\Direction;

/**
 * Rover entity class.
 */
class Rover {
    /**
     * Rover's position.
     *
     * @var \Curiosity\Application\Type\Coordinate
     */
    private Coordinate $position;

    /**
     * Rover's orientation.
     *
     * @var string
     */
    private string $orientation;

    /**
     * Rover's commands collection.
     *
     * @var \Curiosity\Application\Entity\Command\CommandCollection
     */
    private CommandCollection $commands;

    /**
     * Rover constructor.
     *
     * @param \Curiosity\Application\Type\Coordinate $position
     * @param string                                 $orientation
     */
    public function __construct(Coordinate $position, string $orientation) {
        $this->setPosition($position);
        $this->setOrientation($orientation);
        $this->setCommands(new CommandCollection());
    }

    /**
     * Rover position getter.
     *
     * @return \Curiosity\Application\Type\Coordinate
     */
    public function getPosition(): Coordinate {
        return $this->position;
    }

    /**
     * Rover position setter.
     *
     * @param \Curiosity\Application\Type\Coordinate $position
     */
    public function setPosition(Coordinate $position): void {
        $this->position = $position;
    }

    /**
     * Rover orientation getter.
     *
     * @return string
     */
    public function getOrientation(): string {
        return $this->orientation;
    }

    /**
     * Rover orientation setter.
     *
     * @param string $orientation
     */
    public function setOrientation(string $orientation): void {
        if (Direction::isValid($orientation) == false) {
            throw new InvalidArgumentException(sprintf('Invalid orientation "%s"', $orientation));
        }
        $this->orientation = $orientation;
    }

    /**
     * Rover commands getter.
     *
     * @return \Curiosity\Application\Entity\Command\CommandCollection
     */
    public function getCommands(): CommandCollection {
        return $this->commands;
    }

    /**
     * Rover commands setter.
     *
     * @param \Curiosity\Application\Entity\Command\CommandCollection $commands
     */
    public function setCommands(CommandCollection $commands): void {
        $this->commands = $commands;
    }

    /**
     * Rover execute commands.
     *
     * @param \Curiosity\Application\Entity\Plateau\Plateau $plateau
     */
    public function execute(Plateau $plateau) {
        foreach ($this->getCommands() as $command) {
            $command->execute($this, $plateau);
        }
    }

    /**
     * Get rover's status as string.
     *
     * @return string
     */
    public function getStatusString(): string {
        return sprintf("%d %d %s", $this->position->getX(), $this->getPosition()->getY(), $this->getOrientation());
    }
}
