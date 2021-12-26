<?php

namespace unit\Entity\Rover;

use Codeception\Test\Unit;
use Curiosity\Application\Entity\Command\CommandCollection;
use Curiosity\Application\Entity\Command\Left;
use Curiosity\Application\Entity\Command\Move;
use Curiosity\Application\Entity\Command\Right;
use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Entity\Rover\Rover;
use Curiosity\Application\Type\Coordinate;
use Curiosity\Application\Type\Direction;

class RoverTest extends Unit {
    private Rover $rover;

    public function setUp(): void {
        parent::setUp();
        $this->rover = new Rover(new Coordinate(0, 0), Direction::East);
    }

    public function testRoverGetters() {
        $this->assertEquals(new Coordinate(0, 0), $this->rover->getPosition());
        $this->assertEquals(Direction::East, $this->rover->getOrientation());
    }

    public function testRoverSetters() {
        $this->rover->setOrientation(Direction::West);
        $this->rover->setPosition(new Coordinate(3, 4));
        $this->assertEquals(new Coordinate(3, 4), $this->rover->getPosition());
        $this->assertEquals(Direction::West, $this->rover->getOrientation());
    }

    public function testRoverGetStatusString() {
        $this->rover->setOrientation(Direction::West);
        $this->rover->setPosition(new Coordinate(3, 4));
        $this->assertSame('3 4 W', $this->rover->getStatusString());
    }

    public function testRoverValidMoveCommandsExecute() {
        $plateau  = new Plateau(new Coordinate(0, 0), new Coordinate(10, 10));
        $commands = new CommandCollection();
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(1, 1));
        $this->rover->setOrientation(Direction::South);
        $this->rover->setCommands($commands);
        $this->rover->execute($plateau);
        $this->assertSame(1, $this->rover->getPosition()->getX());
        $this->assertSame(0, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::South, $this->rover->getOrientation());
    }

    public function testRoverValidAllCommandsExecute() {
        $plateau  = new Plateau(new Coordinate(0, 0), new Coordinate(10, 10));
        $commands = new CommandCollection();
        $commands->append(new Move());
        $commands->append(new Left());
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Right());
        $commands->append(new Right());
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(2, 2));
        $this->rover->setOrientation(Direction::South);
        $this->rover->setCommands($commands);
        $this->rover->execute($plateau);
        $this->assertSame(3, $this->rover->getPosition()->getX());
        $this->assertSame(1, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::West, $this->rover->getOrientation());
    }

    public function testRoverOutboundMaxMoveCommandsExecute() {
        $plateau  = new Plateau(new Coordinate(0, 0), new Coordinate(2, 2));
        $commands = new CommandCollection();
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Right());
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(0, 0));
        $this->rover->setOrientation(Direction::North);
        $this->rover->setCommands($commands);
        $this->rover->execute($plateau);
        $this->assertSame(2, $this->rover->getPosition()->getX());
        $this->assertSame(2, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::East, $this->rover->getOrientation());
    }

    public function testRoverOutboundMinMoveCommandsExecute() {
        $plateau           = new Plateau(new Coordinate(0, 0), new Coordinate(2, 2));
        $commands = new CommandCollection();
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Right());
        $commands->append(new Move());
        $commands->append(new Move());
        $commands->append(new Move());
        $this->rover->setPosition(new Coordinate(0, 0));
        $this->rover->setOrientation(Direction::South);
        $this->rover->setCommands($commands);
        $this->rover->execute($plateau);
        $this->assertSame(0, $this->rover->getPosition()->getX());
        $this->assertSame(0, $this->rover->getPosition()->getY());
        $this->assertSame(Direction::West, $this->rover->getOrientation());
    }
}