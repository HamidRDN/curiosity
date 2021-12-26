<?php

namespace Curiosity\Application\Entity\Command;

use InvalidArgumentException;
use Curiosity\Application\Type\Instruction;

/**
 * CommandFactory class.
 * Static factory class to create Command object.
 */
class CommandFactory {

    /**
     * Create Command object from instruction string.
     *
     * @param string $instruction Available 'L','R','M' instructions
     * @return \Curiosity\Application\Entity\Command\CommandInterface
     */
    public static function create(string $instruction): CommandInterface {
        return match ($instruction) {
            Instruction::Left => new Left(),
            Instruction::Right => new Right(),
            Instruction::Move => new Move(),
            default => throw new InvalidArgumentException(sprintf('Invalid command instruction "%s"', $instruction)),
        };
    }
}
