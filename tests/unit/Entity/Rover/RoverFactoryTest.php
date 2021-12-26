<?php

namespace unit\Entity\Rover;

use Codeception\Test\Unit;
use InvalidArgumentException;
use Curiosity\Application\Entity\Rover\Rover;
use Curiosity\Application\Entity\Rover\RoverFactory;

class RoverFactoryTest extends Unit {
    public function testValidRoverPositionString() {
        $rover = RoverFactory::create('1 2 N');
        $this->assertInstanceOf(Rover::class, $rover);
    }

    public function testValidRoverPositionStringWithSpaces() {
        $rover = RoverFactory::create(' 1 2 N ');
        $this->assertInstanceOf(Rover::class, $rover);
    }

    public function testInvalidRoverPositionString() {
        $this->expectException(InvalidArgumentException::class);
        RoverFactory::create('S 1 2');
    }

    public function testInvalidRoverOrientationString() {
        $this->expectException(InvalidArgumentException::class);
        RoverFactory::create('1 2 X');
    }
}