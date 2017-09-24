<?php

namespace App\Domain\Exceptions;

use Exception;

/**
 * Class JsonException
 */
class JsonException extends Exception
{
    /**
     * @return JsonException
     */
    public static function decodeToStdClassFailed()
    {
        return new self('Unable to decode JSON string to an instance of StdClass');
    }
}
