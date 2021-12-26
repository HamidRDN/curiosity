<?php

namespace unit\Entity\Plateau;

use Codeception\Test\Unit;
use InvalidArgumentException;
use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Entity\Plateau\PlateauFactory;

class PlateauFactoryTest extends Unit {
    public function testValidUpperCoordinateString() {
        $plateau = PlateauFactory::create('5 50');
        $this->assertInstanceOf(Plateau::class, $plateau);
    }

    public function testInvalidUpperCoordinateString() {
        $this->expectException(InvalidArgumentException::class);
        PlateauFactory::create('X 2');
    }
}