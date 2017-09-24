<?php

namespace Core\Router;

/**
 * Class Router
 * Holds an array of routes which application can responds to properly, and also holds a 404 callback, in case there is
 * no registered route for a proper response.
 */
class Router
{
    /**
     * Registered routes.
     * @var array
     */
    private $routes = array();

    /**
     * Callback for 404 http response status.
     * @var
     */
    private $notFound;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        // Set default callback for 404 http response status
        $this->notFound = function($url) {
            // TODO: Text should be configurable
            echo "Error 404 - resource '$url' was not found!";
        };
    }

    /**
     * Registers a new route.
     * @param string   $url
     * @param callable $action
     */
    public function add($url, $action)
    {
        $url = $this->unifyUrl($url);
        $this->routes[$url] = $action;
    }

    /**
     * Overrides default callback for 404 http response status.
     * @param $action
     */
    public function setNotFound($action)
    {
        $this->notFound = $action;
    }

    /**
     * Dispatches current request URL
     * @return mixed
     */
    public function dispatch()
    {
        // Try to find current request URL in array of registered routes and then calls it's callback or controller's action.
        foreach($this->routes as $url => $action) {
            $requestUri = $this->unifyUrl($_SERVER['REQUEST_URI']);
            if($url == $requestUri) {
                if(is_callable($action)) {          // Route's action is a closure
                    return $action();
                }
                list($class, $method) = explode('@', $action);
                $controller = new $class;
                return $controller->$method();     // TODO: Add extra checks for action string
            }
        }

        // If any of routes does not have required URL, notFound callback is executed
        call_user_func_array($this->notFound, array($_SERVER['REQUEST_URI']));
    }

    /**
     * Unifies trailing slashes in URL, so they should look like this: '/', '/resource', etc.
     * @param string $url
     * @return string
     */
    private function unifyUrl($url)
    {
        return '/' . trim($url, '/');
    }
}
