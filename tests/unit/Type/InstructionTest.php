<?php

namespace unit\Type;

use Codeception\Test\Unit;
use Curiosity\Application\Type\Instruction;

class InstructionTest extends Unit {
    public function testValidValues() {
        $this->assertTrue(Instruction::isValid(Instruction::Move));
        $this->assertTrue(Instruction::isValid(Instruction::Left));
        $this->assertTrue(Instruction::isValid(Instruction::Right));
    }

    public function testInvalidValues() {
        $this->assertFalse(Instruction::isValid('A'));
        $this->assertFalse(Instruction::isValid('Z'));
    }
}
