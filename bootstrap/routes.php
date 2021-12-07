<?php

use Morce\Application\ConfigLoader;
use Morce\Routing\Facades\RouteCollectionFacade;
use Morce\Routing\RouteCompiler;
use Morce\Routing\RouteScanner;

$directoriesConfig = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DIRECTORIES);

$routes = new RouteCollectionFacade();

/** @var RouteScanner $routeScanner */
$routeScanner = RouteScanner::getInstance();
$routeFiles = $routeScanner->getFiles();

foreach ($routeFiles as $routeFile){
    require_once $directoriesConfig['routes'].'/'.$routeFile;

}
RouteCompiler::prepare($routes->getCollection());

