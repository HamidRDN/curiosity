<?php

namespace unit\Entity\Command;

use Codeception\Test\Unit;
use Curiosity\Application\Entity\Command\CommandCollection;
use Curiosity\Application\Entity\Command\Move;
use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Entity\Rover\Rover;
use Curiosity\Application\Type\Coordinate;
use Curiosity\Application\Type\Direction;

class MoveTest extends Unit {
    private Plateau $plateau;

    private Rover $rover;

    public function setUp(): void {
        parent::setUp();
        $this->plateau = new Plateau(new Coordinate(0, 0), new Coordinate(10, 10));
        $this->rover   = new Rover(new Coordinate(0, 0), Direction::East);
    }

    public function testInboundOneMove() {
        $commands = new CommandCollection();
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(1, 1));
        $this->rover->setOrientation(Direction::East);
        $this->rover->setCommands($commands);
        $this->rover->execute($this->plateau);
        $this->assertSame(2, $this->rover->getPosition()->getX());
        $this->assertSame(1, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::East, $this->rover->getOrientation());
    }

    public function testInboundManyMove() {
        $commands = new CommandCollection();
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(1, 1));
        $this->rover->setOrientation(Direction::East);
        $this->rover->setCommands($commands);
        $this->rover->execute($this->plateau);
        $this->assertSame(4, $this->rover->getPosition()->getX());
        $this->assertSame(1, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::East, $this->rover->getOrientation());
    }

    public function testOutboundOneMove() {
        $commands = new CommandCollection();
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(10, 1));
        $this->rover->setOrientation(Direction::East);
        $this->rover->setCommands($commands);
        $this->rover->execute($this->plateau);
        $this->assertSame(10, $this->rover->getPosition()->getX());
        $this->assertSame(1, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::East, $this->rover->getOrientation());
    }

    public function testOutboundManyMove() {
        $commands = new CommandCollection();
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(9, 1));
        $this->rover->setOrientation(Direction::East);
        $this->rover->setCommands($commands);
        $this->rover->execute($this->plateau);
        $this->assertSame(10, $this->rover->getPosition()->getX());
        $this->assertSame(1, $this->rover->getPosition()->getY());
    }
}