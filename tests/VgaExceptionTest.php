<?php
/**
 * Created: 2017-06-24 16:38
 */

namespace VgaDatabase\Exceptions\Tests;

use PHPUnit\Framework\TestCase;
use Vgait\VgaException\VgaException;
use Vgait\VgaException\VgaExceptionType;


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
        $this->expectException(VgaExceptionType::class);

        // Params
        $message = "VgaException is thrown";
        $errorCode = 1;
        $previousException = null;

        // Do it!
        throw new VgaException($message, $errorCode, $previousException);
    }


    /**
     * Test that we get output.
     *
     * @depends testIsExceptionThrown
     */
    public function testOutputOfException()
    {

        $stringStart = "VgaException thrown.";
        $output = "This Fails";

        try {
            $message = "Exception Test";
            $errorCode = 1;

            throw new VgaException($message, $errorCode);
        } catch (VgaExceptionType $vgaException) {
            $output = $vgaException->toPrintableString();
        }

        $this->assertStringStartsWith($stringStart, $output);
    }

    /**
     * Throw two exceptions in chain.
     * Check if we get output from all exceptions.
     *
     * @depends testIsExceptionThrown
     */
    public function testStackedExceptions()
    {
        $amountInChain = 3;
        $className = VgaExceptionType::class;

        for (
            $i = $amountInChain, $currentException = $this->throwExceptions($amountInChain);
            $i > 0;
            $i--) {

            $this->assertTrue(is_a($currentException, $className));
            $currentException = $currentException->getPreviousVgaException();
        };

    }

    /**
     * Create a chain of exceptions
     *
     * @param $amountInChain
     * @return VgaExceptionType
     */
    private function throwExceptions($amountInChain): VgaExceptionType
    {
        $currentException = null;

        for ($i = $amountInChain; $i > 0; $i--) {
            $message = "Exception $i";
            $errorCode = $i;
            $prevException = $currentException;

            try {
                throw new VgaException($message, $errorCode, $prevException);
            } catch (VgaException $vgaException) {
                $currentException = $vgaException;
            }

        }

        return $currentException;
    }


}
