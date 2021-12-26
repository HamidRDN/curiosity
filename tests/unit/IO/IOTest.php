<?php

namespace unit\IO;

use Codeception\Test\Unit;
use Curiosity\Application\IO\IO;
use InvalidArgumentException;

class IOTest extends Unit {
    public function testValidIOStream() {
        $io = new IO(STDIN ?? fopen('php://stdin', 'r'));
        $this->assertInstanceOf(IO::class, $io);
    }

    public function testInValidIOStream() {
        $this->expectException(InvalidArgumentException::class);
        new IO(null);
    }
}