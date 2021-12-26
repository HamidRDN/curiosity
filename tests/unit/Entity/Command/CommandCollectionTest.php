<?php

namespace unit\Entity\Command;

use ArrayIterator;
use Traversable;
use Codeception\Test\Unit;
use Curiosity\Application\Entity\Command\CommandCollection;
use Curiosity\Application\Entity\Command\Left;
use Curiosity\Application\Entity\Command\Right;
use Curiosity\Application\Entity\Command\Move;

class CommandCollectionTest extends Unit {

    public function testTraversable() {
        $commands = new CommandCollection();
        $this->assertInstanceOf(Traversable::class, $commands);
    }

    public function testArrayIterator() {
        $commands = new CommandCollection();
        $this->assertInstanceOf(ArrayIterator::class, $commands->getIterator());
    }

    public function testAppendOne() {
        $commands = new CommandCollection();
        $commands->append(new Left());
        $this->assertEquals(1, $commands->count());
    }

    public function testAppendMany() {
        $commands = new CommandCollection();
        $commands->append(new Left());
        $commands->append(new Right());
        $commands->append(new Move());
        $commands->append(new Move());
        $this->assertEquals(4, $commands->count());
    }
}