<?php

namespace Curiosity\Application\Type;

/**
 * Direction type class.
 */
class Direction {

    /**
     * Direction east 'E'.
     */
    public const East = 'E';

    /**
     * Direction North 'N'.
     */
    public const North = 'N';

    /**
     * Direction South 'S'.
     */
    public const South = 'S';

    /**
     * Direction West 'W'.
     */
    public const West = 'W';

    /**
     * Check to see if direction is valid.
     *
     * @param string $value
     * @return bool
     */
    public static function isValid(string $value): bool {
        static $orientations = [self::East, self::North, self::South, self::West];
        return in_array($value, $orientations);
    }
}
