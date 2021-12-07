<?php

use Morce\Routing\Facades\RouteCollectionFacade as RouteCollection;
use Morce\Routing\Facades\RouteFacade as Route;

/** @var RouteCollection $routes */
$routes->group('front', [
    Route::GET('/', [App\Controllers\HomeController::class, 'home'])->setMiddlewares(
        [App\Middleware\MiddlewareAddGlobalVariableToTwig::class]
    ),
]);

$routes->group('dashboard', [
    Route::REDIRECT('/dashboard', '/dashboard/login'),
    Route::GET('/dashboard/login', [\App\Controllers\DashboardController::class, 'login'])->setMiddlewares([]),
]);