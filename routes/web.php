<?php

use App\Controllers\HomeController;
use Source\Routing\Route;
use Source\Routing\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->add(Route::GET('/', [HomeController::class, 'home']));