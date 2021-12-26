<?php

namespace Curiosity\Application\IO;

/**
 * Input class.
 */
class Input extends IO {
    /**
     * Read a line from io stream (console or file).
     *
     * @return string
     */
    public function readLine(): string {
        $result = fgets($this->stream);
        if ($result === false) {
            return '';
        }
        return trim($result);
    }
}