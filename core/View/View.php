<?php

namespace Core\View;

/**
 * Class View
 * Handles view displaying.
 */
class View
{
    /**
     * An instance of ViewLoader class.
     * @var ViewLoader
     */
    private $viewLoader;

    /**
     * View constructor.
     * @param ViewLoader $viewLoader
     */
    public function __construct(ViewLoader $viewLoader)
    {
        $this->viewLoader = $viewLoader;
    }

    /**
     * Displays View by a given name.
     * @param string $viewName
     */
    public function display($viewName)
    {
        echo $this->viewLoader->load($viewName);
    }
}
