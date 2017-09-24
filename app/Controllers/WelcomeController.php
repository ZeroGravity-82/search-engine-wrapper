<?php

namespace App\Controllers;

/**
 * Class WelcomeControoler
 * @package App\Controllers
 */
class WelcomeController extends Controller
{
    public function index()
    {
        $this->view->display('welcome.php');
    }
}
