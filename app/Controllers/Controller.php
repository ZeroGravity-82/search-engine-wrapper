<?php

namespace App\Controllers;

use Core\View\ViewLoader;
use Core\View\View;

/**
 * Class Controller
 * Provides base controller functionality.
 */
class Controller
{
    /**
     * Views handler.
     * @var View
     */
    protected $view;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->view = new View();
    }
}
