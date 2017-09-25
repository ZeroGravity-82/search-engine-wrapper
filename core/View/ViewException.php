<?php

namespace Core\View;

use Exception;

/**
 * Class ViewException
 */
class ViewException extends Exception
{
    /**
     * @param $viewFileName
     * @return ViewException
     */
    public static function notExist($viewFileName)
    {
        return new self('View does not exist: ' . $viewFileName);
    }
}