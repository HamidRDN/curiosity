<?php

namespace unit\Entity\Command;

use Codeception\Test\Unit;
use Curiosity\Application\Entity\Command\CommandCollection;
use Curiosity\Application\Entity\Command\Right;
use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Entity\Rover\Rover;
use Curiosity\Application\Type\Coordinate;
use Curiosity\Application\Type\Direction;

class RightTest extends Unit {
    private Plateau $plateau;

    private Rover $rover;

    public function setUp(): void {
        parent::setUp();
        $this->plateau = new Plateau(new Coordinate(0, 0), new Coordinate(10, 10));
        $this->rover   = new Rover(new Coordinate(0, 0), Direction::East);
    }

    public function testOneTurnRight() {
        $commands = new CommandCollection();
        $commands->append(new Right());
        $this->rover->setPosition(new Coordinate(1, 1));
        $this->rover->setOrientation(Direction::East);
        $this->rover->setCommands($commands);
        $this->rover->execute($this->plateau);
        $this->assertSame(1, $this->rover->getPosition()->getX());
        $this->assertSame(1, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::South, $this->rover->getOrientation());
    }

    public function testManyTurnRight() {
        $commands = new CommandCollection();
        $commands->append(new Right());
        $commands->append(new Right());
        $commands->append(new Right());
        $this->rover->setPosition(new Coordinate(1, 1));
        $this->rover->setOrientation(Direction::East);
        $this->rover->setCommands($commands);
        $this->rover->execute($this->plateau);
        $this->assertSame(1, $this->rover->getPosition()->getX());
        $this->assertSame(1, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::North, $this->rover->getOrientation());
    }
}