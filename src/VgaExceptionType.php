<?php
/**
 * Created: 2017-02-19 16:46
 */

namespace Vgait\VgaException;

use Exception;

abstract class VgaExceptionType extends Exception
{

    /** @var null|VgaExceptionType */
    private $previousVgaException;

    /**
     * VgaDatabaseException constructor.
     *
     * @param string $message Description of exception
     * @param VgaExceptionType|null $previousException
     */
    public function __construct(string $message = "", int $errorCode = 0, VgaExceptionType $previousException = null)
    {
        $this->previousVgaException = $previousException;
        parent::__construct($message, $errorCode);
    }

    /**
     * Return the prevoius VgaException
     *
     * @return VgaExceptionType|null
     */
    public function getPreviousVgaException()
    {
        return $this->previousVgaException;
    }

    /**
     * Returns a printable string that represents all errors in stack
     *
     * @return string
     */
    public function fullStackToPrintableString(): string
    {
        $currentExeption = $this;
        $string = "";

        do {
            $string .= $currentExeption->toPrintableString();
            $currentExeption = $currentExeption->getPreviousVgaException();
        } while (!empty($currentExeption));

        return $string;
    }

    /**
     * Return a printable string that represents this error.
     *
     * @return string
     */
    abstract public function toPrintableString(): string;
}