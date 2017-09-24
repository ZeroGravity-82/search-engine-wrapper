<?php

/**
 * Front Controller
 */

// Bootstrap app components
require('../app/bootstrap.php');
require('../app/routes.php');

// Pass control to the router
$router->dispatch();
