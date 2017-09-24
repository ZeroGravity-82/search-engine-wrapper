<?php

namespace App\Domain\Exceptions;

use Exception;

/**
 * Class XmlException
 */
class XmlException extends Exception
{
    /**
     * @return XmlException
     */
    public static function loadingFailed()
    {
        return new self('Unable to load an XML document from a string');
    }
}
