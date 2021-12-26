<?php

namespace Curiosity\Application\Type;

/**
 * Instruction type class.
 */
class Instruction {
    /**
     * Instruction move.
     */
    public const Move = 'M';

    /**
     * Instruction left.
     */
    public const Left = 'L';

    /**
     * Instruction right.
     */
    public const Right = 'R';

    /**
     * Check to see if instruction is valid.
     *
     * @param string $value
     * @return bool
     */
    public static function isValid(string $value): bool {
        static $orientations = [self::Move, self::Left, self::Right];
        return in_array($value, $orientations);
    }
}