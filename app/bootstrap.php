<?php

use Core\Router\Router;

// Define global constants
define('APP_PATH', dirname(__FILE__));

// Load environment variables as an array
$env = parse_ini_file('../.env');

// Debug mode
if($env['APP_DEBUG'] == '1') {          // TODO: Implement global object with env values
    ini_set('display_errors', true);
    error_reporting(E_ALL);
}

// Load app configuration
$config = require('../config/app.php'); // TODO: Implement global object with config values

// Initialize autoloader
require('../vendor/autoload.php');

// Instantiate routes handler
$router = new Router();
