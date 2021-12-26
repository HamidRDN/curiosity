<?php

namespace Curiosity\Application\IO;

/**
 * Output class.
 */
class Output extends IO {
    /**
     * Write data to stream (console or file)
     *
     * @param string $data
     * @return int
     */
    public function write(string $data): int {
        $result = fputs($this->stream, $data);
        if ($result === false) {
            return 0;
        }
        return $result;
    }

    /**
     * Write data as new line to stream (console or file)
     *
     * @param string $data
     * @return int
     */
    public function writeLine(string $data): int {
        return $this->write($data.PHP_EOL);
    }

    public function close(){
        fclose($this->stream);
    }
}