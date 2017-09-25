<?php

namespace App\Domain\Exceptions;

use Exception;

/**
 * Class SearchEngineException
 */
class SearchEngineException extends Exception
{
    /**
     * @param string $name
     * @return SearchEngineException
     */
    public static function invalidName($name)
    {
        return new self('Invalid search engine name: ' . $name);
    }
}
