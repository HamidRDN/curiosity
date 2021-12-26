<?php

namespace unit\Type;

use Codeception\Test\Unit;
use Curiosity\Application\Type\Direction;

class DirectionTest extends Unit {
    public function testValidValues() {
        $this->assertTrue(Direction::isValid(Direction::East));
        $this->assertTrue(Direction::isValid(Direction::North));
        $this->assertTrue(Direction::isValid(Direction::South));
        $this->assertTrue(Direction::isValid(Direction::West));
    }

    public function testInvalidValues() {
        $this->assertFalse(Direction::isValid('A'));
        $this->assertFalse(Direction::isValid('Z'));
    }
}
