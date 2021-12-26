<?php

namespace unit\Entity\Plateau;

use Codeception\Test\Unit;
use Curiosity\Application\Entity\Plateau\Plateau;
use Curiosity\Application\Type\Coordinate;

class PlateauTest extends Unit {
    private Plateau $plateau;

    public function setUp(): void {
        parent::setUp();
        $this->plateau = new Plateau(new Coordinate(1, 2), new Coordinate(3, 4));
    }

    public function testPlateauGetters() {
        $this->assertEquals(new Coordinate(1, 2), $this->plateau->getLowerLeft());
        $this->assertEquals(new Coordinate(3, 4), $this->plateau->getUpperRight());
    }

    public function testPlateauSetters() {
        $plateau = new Plateau(new Coordinate(0, 0), new Coordinate(0, 0));
        $plateau->setLowerLeft(new Coordinate(1, 2));
        $plateau->setUpperRight(new Coordinate(3, 4));
        $this->assertEquals(new Coordinate(1, 2), $plateau->getLowerLeft());
        $this->assertEquals(new Coordinate(3, 4), $plateau->getUpperRight());
    }

    public function testPlateauLowerLeft() {
        $this->assertSame(1, $this->plateau->getLowerLeft()->getX());
        $this->assertSame(2, $this->plateau->getLowerLeft()->getY());
    }

    public function testPlateauUpperRight() {
        $this->assertSame(3, $this->plateau->getUpperRight()->getX());
        $this->assertSame(4, $this->plateau->getUpperRight()->getY());
    }

    public function testPlateauInboundCoordinate() {
        $coordinate = new Coordinate(1, 2);
        $this->assertTrue($this->plateau->isCoordinateInbound($coordinate));
    }

    public function testPlateauOutboundCoordinate() {
        $coordinate = new Coordinate(1, 5);
        $this->assertFalse($this->plateau->isCoordinateInbound($coordinate));
    }
}