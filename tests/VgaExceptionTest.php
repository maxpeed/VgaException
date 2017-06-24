<?php
/**
 * Created: 2017-06-24 16:38
 */

namespace VgaDatabase\Exceptions\Tests;

use \VgaException\VgaException;

use PHPUnit\Framework\TestCase;

class VgaExceptionTest extends TestCase
{
    /**
     * Test if we can throw a VgaExeptionType typed exception.
     *
     * @throws VgaException
     */
    public function testIsExceptionThrown()
    {
        // Set the expected behaviour for exceptions
        $this->expectException("\VgaException\VgaExceptionType");

        // Params
        $message = "VgaException is thrown";
        $errorCode = 1;
        $previousException = null;

        // Do it!
        throw new VgaException($message, $errorCode, $previousException);
    }

    public function testOutputOfException () {




    }

    public function testOutputFromStackedExceptions (){

    }
}
