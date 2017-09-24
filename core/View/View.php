<?php

namespace Core\View;

use Exception;

/**
 * Class View
 * Handles view displaying.
 */
class View
{
    /**
     * Path to views directory.
     * @var string
     */
    private $path;

    /**
     * View's data.
     * @var
     */
    protected $data = array();

    /**
     * View constructor.
     */
    public function __construct()
    {
        $this->path = APP_PATH . '/Views/';
    }

    /**
     * Render a view.
     * @param string $viewName
     * @throws Exception
     */
    public function render($viewName)
    {
        $viewFileName = $this->path . $viewName;
        if(!file_exists($viewFileName)) {
            // TODO: Make custom exception class
            throw new Exception("View does not exist: " . $viewFileName);
        }
        extract($this->data);
        ob_start();
        require($viewFileName);
        echo ob_get_clean();
    }

    /**
     * Assign value for a view.
     * @param string $key
     * @param mixed  $value
     */
    public function assign($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * Get value which is assigned to a view.
     * @param string $name
     * @return mixed
     */
    public function _get($name)
    {
        return array_key_exists($name, $this->data)
            ? $this->data[$name]
            : null;
    }
}
