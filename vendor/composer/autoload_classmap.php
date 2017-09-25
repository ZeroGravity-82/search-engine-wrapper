<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\Controllers\\Controller' => $baseDir . '/app/Controllers/Controller.php',
    'App\\Controllers\\SearchController' => $baseDir . '/app/Controllers/SearchController.php',
    'App\\Domain\\Exceptions\\CurlException' => $baseDir . '/app/Domain/Exceptions/CurlException.php',
    'App\\Domain\\Exceptions\\JsonException' => $baseDir . '/app/Domain/Exceptions/JsonException.php',
    'App\\Domain\\Exceptions\\SearchEngineException' => $baseDir . '/app/Domain/Exceptions/SearchEngineException.php',
    'App\\Domain\\Exceptions\\XmlException' => $baseDir . '/app/Domain/Exceptions/XmlException.php',
    'App\\Domain\\SearchEngine\\AbstractSearch' => $baseDir . '/app/Domain/SearchEngine/AbstractSearch.php',
    'App\\Domain\\SearchEngine\\DdgJsonResponseParser' => $baseDir . '/app/Domain/SearchEngine/DdgJsonResponseParser.php',
    'App\\Domain\\SearchEngine\\DdgSearch' => $baseDir . '/app/Domain/SearchEngine/DdgSearch.php',
    'App\\Domain\\SearchEngine\\GoogleAtomResponseParser' => $baseDir . '/app/Domain/SearchEngine/GoogleAtomResponseParser.php',
    'App\\Domain\\SearchEngine\\GoogleSearch' => $baseDir . '/app/Domain/SearchEngine/GoogleSearch.php',
    'App\\Domain\\SearchEngine\\ResponseParserInterface' => $baseDir . '/app/Domain/SearchEngine/ResponseParserInterface.php',
    'App\\Domain\\SearchEngine\\Result' => $baseDir . '/app/Domain/SearchEngine/Result.php',
    'App\\Domain\\SearchEngine\\ResultFactory' => $baseDir . '/app/Domain/SearchEngine/ResultFactory.php',
    'App\\Domain\\SearchEngine\\ResultFactoryInterface' => $baseDir . '/app/Domain/SearchEngine/ResultFactoryInterface.php',
    'App\\Domain\\SearchEngine\\SearchEngineFactory' => $baseDir . '/app/Domain/SearchEngine/SearchEngineFactory.php',
    'App\\Domain\\SearchEngine\\XmlResponseParser' => $baseDir . '/app/Domain/SearchEngine/XmlResponseParser.php',
    'App\\Domain\\SearchEngine\\YandexSearch' => $baseDir . '/app/Domain/SearchEngine/YandexSearch.php',
    'App\\Domain\\SearchEngine\\YandexXmlResponseParser' => $baseDir . '/app/Domain/SearchEngine/YandexXmlResponseParser.php',
    'App\\Models\\Model' => $baseDir . '/app/Models/Model.php',
    'Core\\Router\\Router' => $baseDir . '/core/Router/Router.php',
    'Core\\View\\View' => $baseDir . '/core/View/View.php',
    'Core\\View\\ViewException' => $baseDir . '/core/View/ViewException.php',
);
