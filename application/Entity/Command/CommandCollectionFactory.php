<?php

namespace Curiosity\Application\Entity\Command;

use InvalidArgumentException;
use Curiosity\Application\Type\Instruction;

/**
 * CommandCollectionFactory class.
 * Static factory class to create CommandCollection object.
 */
class CommandCollectionFactory {

    /**
     * Factory creator for CommandCollection from instructions string.
     *
     * @param string $commandInstructions Chain of instructions. Example: 'MRLMM'
     * @return \Curiosity\Application\Entity\Command\CommandCollection
     */
    public static function create(string $commandInstructions): CommandCollection {
        if (preg_match('@(?<instructions>[A-Z]+)@', $commandInstructions, $matches) !== 1) {
            throw new InvalidArgumentException(sprintf('Invalid instructions "%s"', $commandInstructions));
        }
        $commands     = new CommandCollection();
        $instructions = str_split($matches['instructions']);
        foreach ($instructions as $instruction) {
            if (Instruction::isValid($instruction) === false) {
                throw new InvalidArgumentException(sprintf('Invalid instruction "%s"', $instruction));
            }
            $commands->append(CommandFactory::create($instruction));
        }
        return $commands;
    }
}
