<?php

namespace Core\View;

use Exception;

/**
 * Class ViewLoader
 * Handles view file loading.
 */
class ViewLoader
{
    /**
     * Path to views directory.
     * @var string
     */
    private $path;

    /**
     * ViewLoader constructor.
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Returns a content of View file.
     * @param string $viewName
     * @return bool|string
     * @throws Exception
     */
    public function load($viewName)
    {
        if(!file_exists($this->path . $viewName)) {
            // TODO: Make custom exception class
            throw new Exception("View does not exist: " . $this->path . $viewName);
        }
        return file_get_contents($this->path . $viewName);
    }
}
