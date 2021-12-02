<?php

use Source\Application\ConfigLoader;
use Source\Routing\Facades\RouteCollectionFacade;
use Source\Routing\RouteCompiler;
use Source\Routing\RouteScanner;

$directoriesConfig = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_DIRECTORIES);

$routes = new RouteCollectionFacade();

/** @var RouteScanner $routeScanner */
$routeScanner = RouteScanner::getInstance();
$routeFiles = $routeScanner->getFiles();

foreach ($routeFiles as $routeFile){
    require_once $directoriesConfig['routes'].'/'.$routeFile;

}
RouteCompiler::prepare($routes->getCollection());

