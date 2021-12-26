<?php

namespace unit\Type;

use Codeception\Test\Unit;
use Curiosity\Application\Type\Coordinate;

class CoordinateTest extends Unit {
    public function testIntegerConstruction() {
        $coordinate = new Coordinate(1, 2);
        $this->assertSame(1, $coordinate->getX());
        $this->assertSame(2, $coordinate->getY());
    }

    public function testStringConstruction() {
        $coordinate = new Coordinate(1, 2);
        $this->assertSame(1, $coordinate->getX());
        $this->assertSame(2, $coordinate->getY());
    }

    public function testXSetter() {
        $coordinate = new Coordinate(0, 0);
        $coordinate->setX(1);
        $this->assertSame(1, $coordinate->getX());
    }

    public function testYSetter() {
        $coordinate = new Coordinate(0, 0);
        $coordinate->setY(2);
        $this->assertSame(2, $coordinate->getY());
    }
}
