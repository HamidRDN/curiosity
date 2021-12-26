<?php

namespace Curiosity\Application\IO;

use InvalidArgumentException;

/**
 * IO parent class.
 */
class IO {
    /**
     * IO stream resource.
     *
     * @var mixed|resource
     */
    protected mixed $stream;

    /**
     * IO constructor.
     *
     * @param mixed $stream
     */
    public function __construct(mixed $stream) {
        if (is_resource($stream) === false) {
            throw new InvalidArgumentException("Invalid input/output stream");
        }
        $this->stream = $stream;
    }
}