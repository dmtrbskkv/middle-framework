<?php

use Source\Routing\RouteCollection;
use Source\Routing\RouteCompiler;


$routes = new RouteCollection();
require_once __DIR__ . '/../routes/web.php';
RouteCompiler::prepare($routes);

