<?php

namespace App\Domain\Exceptions;

use Exception;

/**
 * Class CurlException
 */
class CurlException extends Exception
{
    /**
     * @return CurlException
     */
    public static function initializationFailed()
    {
        return new self('Unable to initialize a new session');
    }

    /**
     * @return CurlException
     */
    public static function executionFailed()
    {
        return new self('Unable to execute the given session');
    }

    /**
     * @param $responseCode int
     * @param $response mixed
     * @return CurlException
     */
    public static function unexpectedResponseCode($responseCode, $response)
    {
        return new self("Unexpected response HTTP code: $responseCode. Response: $response");
    }
}
