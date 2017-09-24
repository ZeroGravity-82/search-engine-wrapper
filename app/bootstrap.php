<?php

use Core\Router\Router;

// Load app configuration
require('config.php');

// Initialize autoloader
require('../vendor/autoload.php');

// Instantiate routes handler
$router = new Router();
