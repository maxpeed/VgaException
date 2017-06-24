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
        return sprintf(
            "VgaException thrown." . PHP_EOL
            . "File: %s" . PHP_EOL
            . "Line: %s" . PHP_EOL
            . "Description: %s" . PHP_EOL,
            $this->getFile(),
            $this->getLine(),
            $this->getMessage()
        );
    }
}