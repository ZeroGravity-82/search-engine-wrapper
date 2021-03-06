<?php

namespace Core\View;

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
     * @throws ViewException In case of view file absence.
     */
    public function render($viewName)
    {
        $viewFileName = $this->path . $viewName;
        if(!file_exists($viewFileName)) {
            throw ViewException::notExist($viewFileName);
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
    public function __get($name)
    {
        return array_key_exists($name, $this->data)
            ? $this->data[$name]
            : null;
    }
}
