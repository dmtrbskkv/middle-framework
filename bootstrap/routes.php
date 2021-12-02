<?php

use Source\Routing\Facades\RouteCollectionFacade;
use Source\Routing\RouteCompiler;


$routes = new RouteCollectionFacade();
require_once __DIR__ . '/../routes/web.php';
RouteCompiler::prepare($routes->getCollection());

