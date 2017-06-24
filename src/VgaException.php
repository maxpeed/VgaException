<?php
/**
 * Created: 2017-06-24 16:43
 */

namespace VgaException;

use VgaException\VgaExceptionType;

class VgaException extends VgaExceptionType
{

    /**
     * Return a printable string that represents this error.
     *
     * @return string
     */
    public function toPrintableString(): string
    {
        $string =
            "VgaException thrown." . PHP_EOL
            . "File: " . $this->getFile() . PHP_EOL
            . "Line: " . $this->getLine() . PHP_EOL
            . "Description: " . $this->getMessage() . PHP_EOL;

        return $string;
    }
}