<?php

use App\Controllers\HomeController;
use Source\Routing\Route;
use Source\Routing\RouteCollection;

/**
 * @var RouteCollection $routes
 */


$routes->group('front', [
    Route::GET('/', [HomeController::class, 'home'])
        ->setMiddlewares([]),
]);