<?php

// Front Controller

ini_set('display_errors', true);
error_reporting(E_ALL);

require('../app/bootstrap.php');
require('../app/routes.php');

$router->dispatch();    // Pass control to the router
