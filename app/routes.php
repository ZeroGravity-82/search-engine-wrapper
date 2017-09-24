<?php

// Start page
$router->add('/', 'App\Controllers\SearchController@index', 'GET');

// Make search and show results
$router->add('search', 'App\Controllers\SearchController@search', 'POST');
